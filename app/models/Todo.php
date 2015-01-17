<?php
class Todo extends \Eloquent{

    public $fillable = ['title','description','project_id','todo_date','todo_status','user_id','group_id','priority_id'];

    public $errors;

    public static function boot(){
        parent::boot();

        static::creating(function($todo_data){
            
        });
    }

    //valdiations
    public function rules($id){
        return [
            'title'=>'required|min:3|unique:todos,title,'.$id
        ];
    }

    public function isValid($id=null){
        $validator = Validator::make($this->attributes,$this->rules($id));
        if($validator->passes()) return true;

        $this->errors = $validator->messages();
        return false;
    }



    //relationships
    public function user(){
        return $this->belongsTo('User');
    }


    public function project(){
        return $this->belongsTo('Project');
    }

    public function priority(){
        return $this->belongsTo('TodoPriority');
    }

    public function group(){
        return $this->belongsTo('TodoGroup');
    }

    //scope functions
    public function scopeOwner($query,$userId){
        try{
            return $query->whereUserId($userId);
        }catch (Exception $e){
            echo 'exp';exit;
        }

    }

    public function scopeByproject($query,$projectId){
        return $query->whereProjectId($projectId);

    }

    public function scopeWithProject($query){
        return $query->with(array('project'=>function($query){
            $query->select('id','name');
        }));
    }

    public function scopeWithPriority($query){
        return $query->with(array('priority'=>function($query){
            $query->select('id','name');
        }));
    }

    public function scopeWithGroup($query){
        return $query->with(array('group'=>function($query){
            $query->select('id','name');
        }));
    }


}