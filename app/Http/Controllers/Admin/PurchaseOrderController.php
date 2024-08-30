<?php

namespace App\Http\Controllers\Admin;

use auth;
use Carbon\Carbon;
use App\Models\Supplier;
use App\Models\ProductGen;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Http\Controllers\Controller;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        $purchaseOrders = PurchaseOrder::where('po_status', 1)->get();
        return view('admin.liquorProducts.purchaseOrders.active_purchase_order', compact('purchaseOrders','suppliers'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'supplier'      => 'required',
            'currency'      => 'required',
            'po_date'       => 'required',
            'date_required' => 'required',
        ]);
        $lastUsedPoNumber = PurchaseOrder::orderBy('id', 'desc')->first();
        $lastNumber = $lastUsedPoNumber ? intval(substr($lastUsedPoNumber->po_number, 2)) : 0;
        $newNumber = $lastNumber + 1;
        PurchaseOrder::create([
            'lnk_supplier'      => $request->supplier,
            'po_number'         => 'PO' . $newNumber,
            'currency'          => $request->currency,
            'po_date'           => $request->po_date,
            'date_required'     => $request->date_required,
            'currency'          => $request->currency,
            'po_status'         => 1,
            'po_receive_status' => 1,
            'lnk_user_prepare'  => auth()->id(),
            'dt_prepare'        => Carbon::now(),
            'lnk_user_insert'   => auth()->id(),

        ]);
        return redirect()->route('admin.liquor-active-purchase');
    }

    public function list(Request $request)
    {
        // dd($request->all());
        $suppliers = Supplier::all();
        $allPurchaseOrders = PurchaseOrder::when(($request->input('supplier') != ""), function($query) use ($request){
            $query->where('lnk_supplier', $request->input('supplier'));
        })
        ->when(($request->input('po_number') != ""), function($query) use ($request){
            $query->where('po_number', 'like', '%' . $request->input('po_number'). '%');
        })
        ->when(($request->input('po_status') != ""), function ($query) use ($request) {
            $query->where('po_status', $request->input('po_status'));
        })
        ->when($request->filled('po_receive_status'), function ($query) use ($request) {
            $query->whereIn('po_receive_status', $request->input('po_receive_status'));
        });

        $allRecords = $allPurchaseOrders->count(); // Get the total count of records
        $allPurchaseOrders = $allPurchaseOrders->orderByDesc('id')->paginate($request->pages??30);
        return view('admin.liquorProducts.purchaseOrders.active_purchase_order', compact('allPurchaseOrders','suppliers','allRecords'));
    }

    public function poListPreparation(Request $request)
    {
        $suppliers = Supplier::all();
        $purchaseOrders = PurchaseOrder::where('po_status', 1)
        ->when(($request->input('supplier') != ""), function($query) use ($request){
            $query->where('lnk_supplier', $request->input('supplier'));
        });

        $allRecords = $purchaseOrders->count(); // Get the total count of records
        $purchaseOrders = $purchaseOrders->orderByDesc('id')->paginate($request->pages??30);
        return view('admin.purchasing.po_list_preparation', compact('purchaseOrders','suppliers', 'allRecords'));

    }

    public function show($id){
        $purchaseOrder = PurchaseOrder::where('id', $id)->first();
        // dd($purchaseOrder);
        return view('admin.liquorProducts.purchaseOrders.view', compact('purchaseOrder'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        if($request->page_id == 'purchase_order_set_as_completed'){
            $request->validate([
                'po_date' => 'required',
                'po_number' => 'required|unique:purchase_orders,po_number,' .$request->po_id,
            ]);
            PurchaseOrder::where('id', $request->po_id)->update([
                'po_number' => $request->po_number,
                'po_date'   => $request->po_date,
                'po_status' => 2,
                'po_notes'  => $request->po_notes,
            ]);
            return response()->json();
        }elseif($request->page_id == 'duplicate this po'){
            $PurchaseOrder = PurchaseOrder::where('id', $request->po_id)->first();
            $lastUsedPoNumber = PurchaseOrder::orderBy('id', 'desc')->first();
            $lastNumber = $lastUsedPoNumber ? intval(substr($lastUsedPoNumber->po_number, 2)) : 0;
            $newNumber = $lastNumber + 1;
            $pid = PurchaseOrder::create([
                'lnk_supplier'      => $PurchaseOrder->lnk_supplier,
                'po_number'         => 'PO' . $newNumber,
                'currency'          => $PurchaseOrder->currency,
                'po_date'           => $PurchaseOrder->po_date,
                'date_required'     => $PurchaseOrder->date_required,
                'currency'          => $PurchaseOrder->currency,
                'po_status'         => 1,
                'po_receive_status' => $PurchaseOrder->po_receive_status,
                'lnk_user_prepare'  => auth()->id(),
                'dt_prepare'        => Carbon::now(),
                'lnk_user_insert'   => auth()->id(),
                'license_number'    => $PurchaseOrder->license_number,
                'po_notes'          => $PurchaseOrder->po_notes,
                'sub_total'         => $PurchaseOrder->sub_total
            ]);
            return response()->json(['id' => $pid->id]);
        }elseif($request->page_id == 'Save Changes'){
            PurchaseOrder::where('id', $request->po_id)->update([
                'po_date'           => $request->po_date,
                'date_required'     => $request->date_required,
                'license_number'    => $request->license_number,
                'po_notes'          => $request->po_notes,
                'sub_total'         => $request->sub_total
            ]);
            return redirect()->route('admin.purchase-order-view', ['id' => $request->po_id]);
        }elseif($request->page_id == 'Abort this PO'){
            PurchaseOrder::where('id', $request->po_id)->update([
                'po_receive_status' => 4,
            ]);
            return response()->json(['id' => $request->po_id]);
        }elseif($request->page_id == 'Back to Preparation'){
            PurchaseOrder::where('id', $request->po_id)->update([
                'po_status' => 1,
            ]);
            return response()->json(['id' => $request->po_id]);
        }
        // return redirect()->route('admin.purchase-order-view');
    }
    public function destroy($id)
    {
        PurchaseOrder::where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'PO Was deleted.']);
    }

    public function poReceiveNew(Request $request)
    {
        $purchaseOrder = PurchaseOrder::where('id', $request->po_id)->first();
        return view('admin.liquorProducts.purchaseOrders.po_receive_new', compact('purchaseOrder'));
    }

    // public function liquorProductSearch(Request $request)
    // {
        
    //     $inputValue = $request->input_value;

    // // Query products based on the input value
    //     $allPurchaseOrders = ProductGen::when($inputValue, function($query) use ($inputValue) {
    //         return $query->where('product_name', 'like', '%' .$inputValue. '%');
    //     })->take(10)->pluck('product_name');
    //     dd($allPurchaseOrders);
    //     return response()->json(['allPurchaseOrders' => $allPurchaseOrders]);
    // }

    public function liquorProductSearch(Request $request)
    {
        $inputValue = $request->input_value;
        if (!empty($inputValue)) {
            $productNames = ProductGen::where('product_name', 'like', '%' . $inputValue . '%')
                ->take(10)
                ->get();
            return response()->json(['productNames' => $productNames]);
        } else {
            return response()->json(['productNames' => []]);
        }
    }

    public function poListOnHand(Request $request)
    {
        $suppliers = Supplier::all();
        $purchaseOrders = PurchaseOrder::when(($request->input('supplier') != ""), function($query) use ($request){
            $query->where('lnk_supplier', $request->input('supplier'));
        });
        $allRecords = $purchaseOrders->count(); // Get the total count of records
        $purchaseOrders = $purchaseOrders->orderByDesc('id')->paginate($request->pages??30);
        return view('admin.purchasing.po_list_on_hand', compact('purchaseOrders','suppliers', 'allRecords'));
    }

    public function weeklyItemsRrequirementList()
    {
        return view('admin.purchasing.weekly_items_requirement');
    }

    public function poReceiveList()
    {

    }
}
