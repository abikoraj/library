<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;
    public function amt()
    {
        switch ($this->type) {
            case '0':
                return $this->data;
                break;
            case '1':
                return $this->data;
                break;

            default:
                $str = '';
                $data = json_decode($this->data);
                foreach ($data as $val) {
                    $str = $str . 'upto ' . $val->days . ' days - Rs.' . $val->amt . '<br>';
                }
                return trim($str, '<br>');
                break;
        }
    }
}
