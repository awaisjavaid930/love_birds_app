<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChickRequest;
use App\Http\Resources\ChickResource;
use App\Models\Chick;
use App\Models\LoveBirdParent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ChickController extends Controller
{
    public function parentChicks(LoveBirdParent $pair, Request $request)
    {
        $chicks = Chick::with('parent')->whereParentId($pair->id)->get();
        if ($request->wantsJson()) {
            return response()->json(['status' => Response::HTTP_OK, 'data' => ChickResource::collection($chicks)]);
        } else {
            return view('chicks.index', compact('chicks', 'pair'));
        }
    }

    public function create(LoveBirdParent $pair)
    {
        return view('chicks.create', compact('pair'));
    }

    public function store(StoreChickRequest $request)
    {
        $validated = $request->validated();
        $validated['id'] = Str::uuid()->toString();
        $chick = Chick::create($validated);
        if ($request->wantsJson()) {
            return response()->json(['status' => Response::HTTP_OK, 'message' => 'records saved!']);
        } else {
            return redirect()->route('pair.chicks', $chick->parent_id);
        }
    }

    public function edit(Chick $chick, Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json(['status' => Response::HTTP_OK, 'data' => ChickResource::make($chick)]);
        } else {
            return view('chicks.edit', compact('chick'));
        }
    }

    public function update(StoreChickRequest $request, Chick $chick)
    {
        $chick->update($request->validated());
        if ($request->wantsJson()) {
            return response()->json(['status' => Response::HTTP_OK, 'data' => ChickResource::make($chick)]);
        } else {
            return redirect()->route('pair.chicks', $chick->parent_id);
        }
    }

    public function destroy(Chick $chick)
    {
        $chick->delete();

        return redirect()->route('pair.chicks', $chick->parent_id);
    }
}
