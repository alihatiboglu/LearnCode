<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Photo;
use Illuminate\Support\Str;
class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(15);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:2|max:150',
            'status' => 'required|integer|in:0,1',
            'link' => 'required|url',
            'track_id' => 'required|integer',
        ];
        
        $this->validate( $request, $rules );
        
        $request ['slug'] = strtolower(str_replace(' ', '-', $request->title));

        $course = Course::create($request->all());
        
        if($course){
            //insert the image 
            if($file = $request->file('image')){
                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                
                //ex: file name =(walid.jpg) => in database save = (12323_walid_.jpg)
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' .$fileextension;

                if($file->move('images', $file_to_store)){
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $course->id,
                        'photoable_type' => 'App\course',
                    ]);
                }

            }
            return redirect('/admin/courses')->withStatus('Course Successfully Created.');
        }
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
         $rules = [
            'title' => 'required|min:2|max:150',
            'status' => 'required|integer|in:0,1',
            'link' => 'required|url',
            'track_id' => 'required|integer',
        ];
        
        $this->validate( $request, $rules );
       
        $course->update($request->all());
       
            if($file = $request->file('image')){
                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                
                //ex: file name =(walid.jpg) => in database save = (12323_walid_.jpg)
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.' .$fileextension;

                if($file->move('images', $file_to_store)){
                    if($course->photo){
                        $photo = $course->photo;
                        //delete old photo 
                        $filename = $photo->filename;
                        unlink('images/'.$filename);
                        //..
                        $photo->filename = $file_to_store;
                        $photo->save();
                    }else{
                        Photo::create([
                            'filename' => $file_to_store,
                            'photoable_id' => $course->id,
                            'photoable_type' => 'App\course',
                        ]);
                    }
                }

            }
            return redirect('/admin/courses')->withStatus('Course Successfully Updated.');
        
    }

    public function destroy(Course $course)
    {
        // delete file in server 
        if($course->photo){
            $filename = $course->photo->filename;
            unlink('images/'.$filename);
        }
        //delete photo indatabase 
        $course->photo->delete();
        //delete course 
        $course->delete();
        return redirect('/admin/courses')->withStatus('Course Successfully Deleted.');
    }
}
