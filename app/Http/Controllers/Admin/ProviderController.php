<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Provider;
use App\Models\Ward;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:provider-list|provider-create|provider-edit|provider-delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:provider-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:provider-edit', ['only' => ['edit', 'update', 'updateProdColorQty']]);
        // $this->middleware('permission:provider-delete', ['only' => ['destroy', 'deleteImage', 'deleteProdColorQty']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::latest()->paginate(5);
        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        return view('admin.providers.index', compact('providers','cities','districts','wards'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        return view('admin.providers.create', compact('cities', 'districts', 'wards'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'provider_code'     => 'required',
            'provider_name'     => 'required',
            'provider_email'    => 'required',
            'provider_phone'    => 'required',
            'provider_city'    => 'required',
            'provider_district'    => 'required',
            'provider_ward'    => 'required',
            'provider_street'    => 'required',
            'status'            => 'required',
        ]);

        $provider = new Provider;
        $provider->provider_code =          $data['provider_code'];
        $provider->provider_name =          $data['provider_name'];
        $provider->provider_email =         $data['provider_email'];
        $provider->provider_phone =         $data['provider_phone'];
        $provider->provider_city =          $data['provider_city'];
        $provider->provider_district =      $data['provider_district'];
        $provider->provider_ward =          $data['provider_ward'];
        $provider->provider_street =        $data['provider_street'];
        $provider->status =                 $data['status'] == true ? '1' : '0';
        $provider->save();

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(provider $provider)
    {
        $cities = City::get();
        $districts = District::get();
        $wards = Ward::get();
        return view('admin.providers.edit', compact('provider','cities','districts','wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        request()->validate([
            'provider_code'     => 'required',
            'provider_name'     => 'required',
            'provider_email'    => 'required',
            'provider_phone'    => 'required',
            'provider_city'    => 'required',
            'provider_district'    => 'required',
            'provider_ward'    => 'required',
            'provider_street'    => 'required',
            'status'            => 'required',
        ]);


        $provider = Provider::findOrFail($id);

        if ($provider) {
            $provider->provider_code = $request->input('provider_code');
            $provider->provider_name = $request->input('provider_name');
            $provider->provider_email = $request->input('provider_email');
            $provider->provider_phone = $request->input('provider_phone');
            $provider->provider_city = $request->input('provider_city');
            $provider->provider_district = $request->input('provider_district');
            $provider->provider_ward = $request->input('provider_ward');
            $provider->provider_street = $request->input('provider_street');
            $provider->status = $request->input('status') == true ? '1' : '0';
            $provider->update();

            return redirect()->route('admin.providers.index')->with('success', 'Provider updated successfully.');
        } else {
            return redirect()->route('admin.providers.index')->with('error', 'No Such Slider Id Found.');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(provider $provider)
    {
        $provider->delete();

        return redirect()->route('admin.providers.index')
            ->with('success', 'Provider deleted successfully');
    }


    public function select_address(Request $request)
    {

        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $add_district = District::where('matp', $data['ma_id'])->orderBy('maqh', 'ASC')->get();
                $output .= '<option>------------------------------------Chọn quận huyện------------------------------------<option>';
                foreach ($add_district as $key => $district) {
                    $output .= '<option value="' . $district->maqh . '">' . $district->name . '</option>';
                }
            } else {
                $add_ward = Ward::where('maqh', $data['ma_id'])->orderBy('xaid', 'ASC')->get();
                $output .= '<option>------------------------------------Chọn xã phường------------------------------------<option>';
                foreach ($add_ward as $key => $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name . '</option>';
                }
            }
        }
        echo $output;
    }
}
