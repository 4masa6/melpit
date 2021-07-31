<?php

namespace App\Http\Controllers;

use App\Models\ItemCondition;
use App\Models\PrimaryCategory;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function showSellForm()
    {
        $conditions = ItemCondition::orderBy('sort_no')->get();
        // 主カテゴリーとサブカテゴリーのN+1問題解決
        $categories = PrimaryCategory::query()
            ->with([
                'secondaryCategories' => function($query) {
                    $query->orderBy('sort_no');
                }
            ])
            ->orderBy('sort_no')
            ->get();
        return view('sell', compact('conditions', 'categories'));
    }
}
