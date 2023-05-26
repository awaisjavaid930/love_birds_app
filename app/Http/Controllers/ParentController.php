<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParentRequest;
use App\Http\Resources\PairResource;
use App\Models\LoveBirdParent;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ParentController extends Controller
{
    public function index(Request $request)
    {
        $parents = LoveBirdParent::with('chicks')->whereUserId(Auth::id())->get();
        if ($request->wantsJson()) {
            return response()->json(['status' => Response::HTTP_OK, 'data' => PairResource::collection($parents)]);
        } else {
            return view('pairs.index', compact('parents'));
        }
    }

    public function create()
    {
        return view('pairs.create');
    }

    public function store(StoreParentRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['id'] = Str::uuid()->toString();
        LoveBirdParent::create($validated);
        if ($request->wantsJson()) {
            return response()->json(['status' => Response::HTTP_CREATED, 'message' => 'recored saved!']);
        } else {
            return redirect()->route('pairs.index');
        }
    }

    public function edit(LoveBirdParent $pair, Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json(['status' => Response::HTTP_OK, 'data' => PairResource::make($pair)]);
        } else {
            return view('pairs.edit', compact('pair'));
        }
    }

    public function update(StoreParentRequest $request, LoveBirdParent $pair)
    {
        $pair->update($request->validated());
        if ($request->wantsJson()) {
            return response()->json(['status' => Response::HTTP_CREATED, 'message' => 'recored updated!']);
        } else {
            return redirect()->route('pairs.index');
        }
    }

    public function destroy(LoveBirdParent $pair)
    {
        $pair->delete();

        return redirect()->route('pairs.index');
    }
}
