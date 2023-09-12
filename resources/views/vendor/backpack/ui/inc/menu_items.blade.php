{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<x-backpack::menu-item title="Users" icon="la la-users" :link="backpack_url('user')" />

<x-backpack::menu-item title="Class models" icon="la la-question" :link="backpack_url('class-model')" />
<x-backpack::menu-item title="Courses" icon="la la-question" :link="backpack_url('course')" />
<x-backpack::menu-item title="Course professors" icon="la la-question" :link="backpack_url('course-professor')" />
<x-backpack::menu-item title="Course takers" icon="la la-question" :link="backpack_url('course-taker')" />
<x-backpack::menu-item title="Ed programs" icon="la la-question" :link="backpack_url('ed-program')" />
<x-backpack::menu-item title="Lessons" icon="la la-question" :link="backpack_url('lesson')" />
<x-backpack::menu-item title="Materials" icon="la la-question" :link="backpack_url('material')" />
<x-backpack::menu-item title="Homework" icon="la la-question" :link="backpack_url('homework')" />
<x-backpack::menu-item title="Homework uploads" icon="la la-question" :link="backpack_url('homework-upload')" />