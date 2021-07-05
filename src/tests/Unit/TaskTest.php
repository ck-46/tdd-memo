<?php

namespace Tests\Unit;

use App\Task;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        // 全件取得
        $tasks = Task::all();
        // 3件取得できるはず
        $this->assertEquals(3, count($tasks));

        // 実行完了していないものを取得
        $task_not_finished = Task::where('executed', false)->get();
        // 2件取得できるはず
        $this->assertEquals(2, count($task_not_finished));

        // 実行完了しているものを取得
        $task_finished = Task::where('executed', true)->get();
        // 1件取得できるはず
        $this->assertEquals(1, count($task_finished));

        // 「テストタスク」というタイトルのレコードを取得
        $task1 = Task::where('title', "テストタスク")->first();
        // 実行完了していないはず
        $this->assertFalse(boolval($task1->executed));

        // 「終了タスク」というタイトルのレコードを取得
        $task1 = Task::where('title', "終了タスク")->first();
        // 実行完了しているはず
        $this->assertTrue(boolval($task1->executed));
    }
}
