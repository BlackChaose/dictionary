<?php

namespace BlackChaose\Dictionary\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Dictionary extends Model
{
    use Notifiable;
    protected $table = 'dictionaries';
    protected $fillable = [
        'entity',
        'value',
        'file_path',
        'transcription',
        'type',
        'lang',
        'path_to_image',
        'path_to_animation',
        'path_to_video',
        'path_to_audio',
    ];
    protected $hidden = [];

    public function attached_file(){
        return $this->hasMany('BlackChaose\Dictionary\Models\AttachedFile','dic_entity_id');
    }
    public function get_attached_file(){

         return $this->attached_file()->get()->first();
    }
}
