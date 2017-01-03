<ul class="nav nav-sidebar">
    <li  class="sidebar-header" @if(Request::is('dashboard', 'dashboard/*')) class="active" @endif>
        <a href="{!! url('dashboard') !!}"><span class="fa fa-dashboard"></span> Dashboard</a>
    </li>
    @if (Gate::allows('admin'))
    <li class="sidebar-header"><a data-toggle="collapse" href="#collapseorganization"><span class="fa fa-sitemap"></span> Organization</a></li>
    <ul id="collapseorganization" class="panel-collapse collapse nav nav-sidebar">
      <li @if(Request::is('companies', 'companies/1/edit')) class="active" @endif>
          <a href="{!! url('companies/1/edit') !!}"><span class="fa fa-building"></span> General Info</a>
      </li>
      <li @if(Request::is('departments', 'departments/*')) class="active" @endif>
          <a href="{!! url('departments') !!}"><span class="fa fa-users"></span> Departments</a>
      </li>
      <li @if(Request::is('locations', 'locations/*')) class="active" @endif>
          <a href="{!! url('locations') !!}"><span class="fa fa-map-o"></span> Locations</a>
      </li>
    </ul>
    <li class="sidebar-header"><a data-toggle="collapse" href="#collapseattendance"><span class="fa fa-calendar"></span> Attendance</a></li>
    <li class="sidebar-header"><a data-toggle="collapse" href="#collapseadmin"><span class="fa fa-cloud"></span> System Admin</a></li>
    <ul id="collapseadmin" class="panel-collapse collapse nav nav-sidebar">
      <li @if(Request::is('logsystems', 'logsystems/*')) class="active" @endif>
          <a href="{!! url('logsystems') !!}"><span class="fa fa-database"></span> Log</a>
      </li>
      <li @if(Request::is('admin/users', 'admin/users/*')) class="active" @endif>
          <a href="{!! url('admin/users') !!}"><span class="fa fa-users"></span> Users</a>
      </li>
      <li @if(Request::is('admin/roles', 'admin/roles/*')) class="active" @endif>
          <a href="{!! url('admin/roles') !!}"><span class="fa fa-lock"></span> Roles</a>
      </li>
    </ul>
    <li class="sidebar-header"><a data-toggle="collapse" href="#collapsereference"><span class="fa fa-folder-open-o"></span> Referensi</a></li>
    <ul id="collapsereference" class="panel-collapse collapse nav nav-sidebar">
      <li @if(Request::is('educations', 'educations/*')) class="active" @endif>
          <a href="{!! url('educations') !!}"><span class="fa fa-graduation-cap"></span> Education</a>
      </li>
      <li @if(Request::is('languages', 'languages/*')) class="active" @endif>
          <a href="{!! url('languages') !!}"><span class="fa fa-microphone"></span> Language</a>
      </li>
      <li @if(Request::is('skills', 'skills/*')) class="active" @endif>
          <a href="{!! url('skills') !!}"><span class="fa fa-plug"></span> Skill</a>
      </li>
      <li @if(Request::is('employmentstatuses', 'employmentstatuses/*')) class="active" @endif>
          <a href="{!! url('employmentstatuses') !!}"><span class="fa fa-rocket"></span> Employment Status</a>
      </li>
      <li @if(Request::is('jobtitles', 'jobtitles/*')) class="active" @endif>
          <a href="{!! url('jobtitles') !!}"><span class="fa fa-legal"></span> Job Title</a>
      </li>
      <li @if(Request::is('salarycomponents', 'salarycomponents/*')) class="active" @endif>
          <a href="{!! url('salarycomponents') !!}"><span class="fa fa-money"></span> Salary Component</a>
      </li>
      <li @if(Request::is('leavetypes', 'leavetypes/*')) class="active" @endif>
          <a href="{!! url('leavetypes') !!}"><span class="fa fa-hotel"></span> Leave Type</a>
      </li>
      <li @if(Request::is('documenttypes', 'documenttypes/*')) class="active" @endif>
          <a href="{!! url('documenttypes') !!}"><span class="fa fa-paperclip"></span> Document Type</a>
      </li>
      <li @if(Request::is('timezones', 'timezones/*')) class="active" @endif>
          <a href="{!! url('timezones') !!}"><span class="fa fa-hourglass"></span> Time Zone</a>
      </li>
    </ul>
    @endif
</ul>
