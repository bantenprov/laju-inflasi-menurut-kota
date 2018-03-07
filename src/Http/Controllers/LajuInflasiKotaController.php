<?php

namespace Bantenprov\LajuInflasiKota\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\BudgetAbsorption\Facades\LajuInflasiKotaFacade;

/* Models */
use Bantenprov\LajuInflasiKota\Models\Bantenprov\LajuInflasiKota\LajuInflasiKota;

/* Etc */
use Validator;

/**
 * The LajuInflasiKotaController class.
 *
 * @package Bantenprov\LajuInflasiKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class LajuInflasiKotaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LajuInflasiKota $laju_inflasi_kota)
    {
        $this->laju_inflasi_kota = $laju_inflasi_kota;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->laju_inflasi_kota->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->laju_inflasi_kota->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laju_inflasi_kota = $this->laju_inflasi_kota;

        $response['laju_inflasi_kota'] = $laju_inflasi_kota;
        $response['status'] = true;

        return response()->json($laju_inflasi_kota);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LajuInflasiKota  $laju_inflasi_kota
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laju_inflasi_kota = $this->laju_inflasi_kota;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:16|unique:laju_inflasi_kotas,label',
            'description' => 'max:255',
        ]);

        if($validator->fails()){
            $check = $laju_inflasi_kota->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $laju_inflasi_kota->label = $request->input('label');
                $laju_inflasi_kota->description = $request->input('description');
                $laju_inflasi_kota->save();

                $response['message'] = 'success';
            }
        } else {
            $laju_inflasi_kota->label = $request->input('label');
            $laju_inflasi_kota->description = $request->input('description');
            $laju_inflasi_kota->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laju_inflasi_kota = $this->laju_inflasi_kota->findOrFail($id);

        $response['laju_inflasi_kota'] = $laju_inflasi_kota;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LajuInflasiKota  $laju_inflasi_kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laju_inflasi_kota = $this->laju_inflasi_kota->findOrFail($id);

        $response['laju_inflasi_kota'] = $laju_inflasi_kota;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LajuInflasiKota  $laju_inflasi_kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $laju_inflasi_kota = $this->laju_inflasi_kota->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:laju_inflasi_kotas,label',
                'description' => 'max:255',
            ]);
        }

        if ($validator->fails()) {
            $check = $laju_inflasi_kota->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $laju_inflasi_kota->label = $request->input('label');
                $laju_inflasi_kota->description = $request->input('description');
                $laju_inflasi_kota->save();

                $response['message'] = 'success';
            }
        } else {
            $laju_inflasi_kota->label = $request->input('label');
            $laju_inflasi_kota->description = $request->input('description');
            $laju_inflasi_kota->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LajuInflasiKota  $laju_inflasi_kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laju_inflasi_kota = $this->laju_inflasi_kota->findOrFail($id);

        if ($laju_inflasi_kota->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
