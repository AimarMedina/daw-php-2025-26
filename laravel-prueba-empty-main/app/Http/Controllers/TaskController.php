<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getLabels($taskID)
    {
        $tasks = Task::find($taskID);

        if (!$tasks) {
            return response()->json('Tarea no encontrada', 404);
        }

        $labels = $tasks->labels->map(function ($label) {
            return [
                'id' => $label->id,
                'name' => $label->name,
            ];
        });
        return response()->json($labels, 200);
    }
}
