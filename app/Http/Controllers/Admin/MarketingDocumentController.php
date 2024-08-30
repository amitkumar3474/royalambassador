<?php

namespace App\Http\Controllers\Admin;

use auth;
use Illuminate\Http\Request;
use App\Models\AttachedDocument;
use App\Models\AttachedDocCategory;
use App\Http\Controllers\Controller;

class MarketingDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachedDocCategories = AttachedDocCategory::select('cat_usage')
            ->groupBy('cat_usage')->orderBy('cat_usage')
            ->get();
        return view('admin.manage.marketing_documents', compact('attachedDocCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request
        // $request->validate([
        //     'file' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048', // Adjust file types and size as needed
        //     'doc_title' => 'required|string|max:255',
        //     'file_type' => 'required|integer',
        // ]);

        // Handle the file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $path = 'uploads/'. $filename; 

            $mimeType = $file->getClientMimeType();
            $mimeToExt = [
                'application/pdf' => 'PDF',
                'application/msword' => 'DOC',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'DOX',
                'text/plain' => 'HTM',
                'image/jpeg' => 'IMG',
                'image/png' => 'IMG',
            ];
            $fileExtension = isset($mimeToExt[$mimeType]) ? $mimeToExt[$mimeType] : 'unknown';
            $attachedDocument = AttachedDocument::create([
                'lnk_cat'         => 5,
                'is_active'       => 1,
                'usage_type'      => $request->usage_type,
                'lnk_related_rec' => $request->lnk_related_rec,
                'doc_title'       => $file->getClientOriginalName(),
                'org_file_name'   => $path,
                'file_type'       => $fileExtension,
                'doc_file_name'   => $file->getClientOriginalName(),
                'lnk_user_insert' => auth()->id()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully',
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attachedDocument = AttachedDocument::whereId($id)->first();
        return response()->json(['attachedDocument' => $attachedDocument]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = AttachedDocument::findOrFail($id);
        $filename = $document->org_file_name;
        $document->delete();
        $filePath = public_path($filename);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        return response()->json(['success' => true]);   
    }

    public function allMarketingDocuments(Request $request)
    {
        // dd($request->all());
        $attachedDocuments = AttachedDocument::where('usage_type', $request->usage_type)
        ->where('lnk_related_rec', $request->lnk_related_rec)
        ->with('docCategory')
        ->get();
        return response()->json(['attachedDocuments'=> $attachedDocuments]);
    }

    // Document Category Add
    public function documentCategoryStore(Request $request)
    {
        AttachedDocCategory::create([
            'cat_usage' => $request->cat_usage,
            'cat_name' => $request->cat_name,
            'is_default_cat' => $request->is_default_cat,
            'cat_desc' => $request->cat_desc,
            'lnk_user_insert' => auth()->id()
        ]);
        return redirect()->back();
    }

    // Document Category Edit
    public function documentCategoryedit($id)
    {
        $attachedDocCategory = AttachedDocCategory::whereId($id)->first();
        return response()->json(['attachedDocCategory' => $attachedDocCategory]);
    }

    // Document Category Update
    public function documentCategoryUpdate(Request $request, $id)
    {
        AttachedDocCategory::whereId($id)->update([
            'cat_name'        => $request->cat_name,
            'is_default_cat'  => $request->is_default_cat?1:0,
            'cat_desc'        => $request->cat_desc,
            'lnk_user_update' => auth()->id()
        ]);
        return redirect()->back();
    }

    // Document Category Delete
    public function documentCategoryDestroy($id)
    {
        AttachedDocCategory::whereId($id)->delete();
        return response()->json(['success' => true]);
    }
}
