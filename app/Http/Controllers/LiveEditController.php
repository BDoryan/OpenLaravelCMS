<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Page;
use App\Models\PageComposition;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LiveEditController extends Controller
{

    public function getBlocks(): JsonResponse
    {
        try {
            $blocks = Block::all();
            return response()->json($blocks);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function addComposite(Request $request, $page_id, $block_id): JsonResponse
    {
        try {
            $block = Block::findOrFail($block_id);
            $page = Page::findOrFail($page_id);

            // Get if the order is set
            $order = $request->order;
            if ($order === null)
                $order = PageComposition::where('page_id', $page->id)->max('order') + 1;

            $composite = new PageComposition([
                'page_id' => $page->id,
                'block_id' => $block->id,
                'order' => $order,
                'data' => json_encode([]),
                'active' => true
            ]);
            $composite->save();

            return response()->json(['success' => true, 'composite' => $composite]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function orderComposites(Request $request, $page_id): JsonResponse
    {
        try {
            $composition = $request->composition;
            foreach ($composition as $index => $composite) {
                $comp = PageComposition::findOrFail($composite);
                $comp->order = $index + 1;
                $comp->save();
            }
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteComposite($page_id, $composite_id): JsonResponse
    {
        try {
            $composite = PageComposition::findOrFail($composite_id);
            $composite->delete();
            return response()->json(['success' => true, 'composite' => $composite]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateComposite(Request $request, $page_id, $composite_id): JsonResponse
    {
        try {
            $composite = PageComposition::findOrFail($composite_id);
            $composite->data = json_encode($request->data);
            $composite->save();
            return response()->json(['success' => true, 'composite' => $composite]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getComposition($page_id): JsonResponse
    {
        try {
            $composites = PageComposition::where('page_id', $page_id)->get();
            return response()->json($composites);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
