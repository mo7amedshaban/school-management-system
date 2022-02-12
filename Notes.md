#### install Authenticaion in laravel

#### mcamara

* change language of website to ar or en

#### spatie/laravel-translatable

* for insert english and arabic in database throughout object { }

#### yoeunes / toastr

* for notification when insert success or fail
#### Html   classrooms.blade.php   controller/classroom/ store
```angular2html
use it when add many columns
<div class="repeater">
    <div data-repeater-list="List_Classes">
        <div data-repeater-item>
            <div class="row">

        # List_Classes return array of string
```
when use relation many to many
```angular2html
* store funciton use attach
public function store(StoreSections $request)
{

try {

    $validated = $request->validated();
    $Sections = new Section();
    $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
    $Sections->Grade_id = $request->Grade_id;
    $Sections->Class_id = $request->Class_id;
    $Sections->Status = 1;
    $Sections->save();
    # save() before attach because section_id must have value then execute next code  teacher_id
    # pivot tABLE   many to many relationship
    $Sections->teachers()->attach($request->teacher_id);
    toastr()->success(trans('messages.success'));
    
    return redirect()->route('Sections.index');
    }
    
    catch (\Exception $e){
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
          }
###############################
* in update use sync

public function update(StoreSections $request)
{
    
    try {
    $validated = $request->validated();
    $Sections = Section::findOrFail($request->id);
    
    $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
    $Sections->Grade_id = $request->Grade_id;
    $Sections->Class_id = $request->Class_id;
    
    if(isset($request->Status)) {
    $Sections->Status = 1;
    } else {
    $Sections->Status = 2;
    }
    
    
    // update pivot tABLE   many to many relationship
    if (isset($request->teacher_id)) {
    $Sections->teachers()->sync($request->teacher_id);
    } else {
    $Sections->teachers()->sync(array());
    }
    
    
    $Sections->save();
    toastr()->success(trans('messages.Update'));
    
    return redirect()->route('Sections.index');
    }
    catch
    (\Exception $e) {
    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
 }



```
### Design Patterns
* create folder app/Repository
* create 2 files      TeacherRepositoryInterface.php , RepositoryInterface.php
* create Provider and register 2 files in it    pa make:provider name
* open config/app  and register provider here


### soft Delete
* $table->softDeletes();   // in migration table
* use SoftDeletes;         // in model
* student::all()  == student::onlyTrashed()->get();
* when column in db  deleted_at is null  this meaning no anything have soft delete and when have timezone meaning softdelete done 
  * can use two   restore();   forceDelete();
    * look in StudentGraduatedRepository.php


### Froginkey
   ```
    # instead of
    
        $table->unsignedBigInteger('teacher_id');
        $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
    
    # use foreignId
                $table->foreignId('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');

   ```

```
#integration with zoom      one  meeting
https://github.com/MacsiDigital/laravel-zoom
install package from link and
open .env  add two variables
open zoom and create app 
1- tab -> solution ->appMarketplace->develop->build app

indirect  many meeting
not use integration but add link and password
can use any thing not only zoom use google meeting and anydisk
```

```
#
 $protected guard = [];
 meening all columns fillable

 $protected guard = ['phone'];
 meening all columns fillable without phone
```
