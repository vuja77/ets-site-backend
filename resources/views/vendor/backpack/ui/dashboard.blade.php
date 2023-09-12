@extends(backpack_view('blank'))

@php
    
    $userCount = \App\Models\User::count();
    $courseCount = \App\Models\Course::count();
    $ClassCount = \App\Models\ClassModel::count();
        // define which model attribute will be shown on draggable elements
        Widget::add()->to('after_content')->type('div')->class('row')->content([

            //widget made using fluent syntax
            Widget::make()
                ->type('progress_white')
                ->class('card border-start-success text-white bg-info')
                ->progressClass('progress-bar bg-white')
                ->value($userCount)
                ->description('Created User.')
                ->progress(100 * (int)$userCount / 100)
                ->hint(1000 - $userCount . ' more until next milestone.'),
    
            //widget made using the array definition
            Widget::make()
                ->type('progress_white')
                ->class('card border-start-success text-white bg-success')
                ->progressClass('progress-bar bg-info bg-white')
                ->value($courseCount)
                ->description('Created course.')
                ->progress(100 * (int)$courseCount / 40)
                ->hint(1000 - $userCount . ' more until next milestone.'),
              Widget::make()
                ->type('progress_white')
                ->class('card border-start-success text-white bg-warning')
                ->progressClass('progress-bar bg-info bg-white')
                ->value($ClassCount)
                ->description('Classes.')
                ->progress(100 * (int)$ClassCount / 100)
                ->hint(1000 - $ClassCount . ' more until next milestone.'),
                Widget::make()
                ->type('progress_white')
                ->class('card border-start-success text-white bg-danger')
                ->progressClass('progress-bar bg-info bg-white')
                ->value($userCount)
                ->description('Created User.')
                ->progress(100 * (int)$userCount / 100)
                ->hint(1000 - $userCount . ' more until next milestone.')
        ]);
        
        
@endphp

@section('content')

  
@endsection