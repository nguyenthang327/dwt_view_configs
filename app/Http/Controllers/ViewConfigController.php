<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreViewConfigRequest;
use App\Models\Department;
use App\Models\User;
use App\Models\ViewConfig;
use App\Models\ViewConfigAttribute;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ViewConfigController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            // $data = User::get();
            // dd( $data[1]->type);
            // dd(1);
            $viewConfigs = ViewConfig::get();
            return view('pages.viewConfigs.index', compact('viewConfigs'));
        }catch(Exception $e){
            Log::error('[ViewConfigController][index] error:' . $e->getMessage());
            return back()->with([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreViewConfigRequest $request)
    {
        try{
            DB::beginTransaction();
            ViewConfig::create([
                'name' => $request->name,
                'code' => $request->code,
            ]);

            DB::commit();
            return back()->with([
                'success' => 'Thành công!',
            ]);
        }catch(Exception $e){
            DB::rollBack();
            Log::error('[ViewConfigController][store] error:' . $e->getMessage());
            return back()->with([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $viewConfig = ViewConfig::with([
                    'viewConfigAttributes',
                    'departments',
                ])
                ->where('id', $id)
                ->first();
            if(!$viewConfig){
                return response()->json([
                    'status' => 404,
                    'msg' => 'Méo tìm thấy màn hình',
                ], 404);
            }
            $departments = Department::get();
            return view('pages.viewConfigs.detail', compact('viewConfig', 'departments'));
        }catch(Exception $e){
            Log::error('[ViewConfigController][show] error:' . $e->getMessage());
            return back()->with([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addViewConfigAttribute(Request $request, $viewConfigID){
        try{
            $validatedData = $request->validate([
                'name' => ['required'],
                'code' => ['required', 'unique:view_config_attributes,code'],
            ]);

            DB::beginTransaction();
            $viewConfig = ViewConfig::where('id', $viewConfigID)->first();
            // dd(1);
            if(!$viewConfig){
                return response()->json([
                    'status' => 404,
                    'msg' => 'Méo tìm thấy màn hình',
                ], 404);
            }
            ViewConfigAttribute::create([
                'name' => $request->name,
                'code' => $request->code,
                'view_config_id' => $viewConfigID,
            ]);

            DB::commit();
            return back()->with([
                'success' => 'Thành công!',
            ]);
        }catch(Exception $e){
            DB::rollBack();
            Log::error('[ViewConfigController][store] error:' . $e->getMessage());
            return back()->with([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function addDepartment(Request $request, $viewConfigID){
        try{
            DB::beginTransaction();
            $viewConfig = ViewConfig::where('id', $viewConfigID)->first();
            if(!$viewConfig){
                return response()->json([
                    'status' => 404,
                    'msg' => 'Méo tìm thấy màn hình',
                ], 404);
            }
           
            DB::commit();
            return back()->with([
                'success' => 'Thành công!',
            ]);
        }catch(Exception $e){
            DB::rollBack();
            Log::error('[ViewConfigController][store] error:' . $e->getMessage());
            return back()->with([
                'error' => $e->getMessage()
            ]);
        }
    }
}
