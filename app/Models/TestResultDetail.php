<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResultDetail extends Model
{
    use HasFactory;

    protected $table = 'test_result_detail';

    protected $fillable = [
        'test_result_id',
        'rujukan',
        'penanggung_jawab',
        'pemeriksa',
        'keterangan',
    ];

    public function testResult()
    {
        return $this->belongsTo(TestResult::class);
    }
}
