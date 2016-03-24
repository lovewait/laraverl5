<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model {

    protected $table ='articles';
    protected $primaryKey = 'article_id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
