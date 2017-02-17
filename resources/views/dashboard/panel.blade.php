<div class="container">
    <div class="panel-group" id="accordion">

      <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{!! url('dashboard') !!}"><span class="fa fa-dashboard"></span> Dashboard</a>
            </div>
      </div>

      @if (Gate::allows('role','admin'))

      <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsecontent"><span class="fa fa-newspaper-o"></span> Content</a>
            </div>
            <div id="collapsecontent" class="panel-collapse collapse">
                <div class="panel-body">
                  <ul class="nav nav-sidebar">
                    <li @if(Request::is('companies', 'companies/1/edit')) class="active" @endif>
                        <a href="{!! url('contents') !!}"><span class="fa fa-file-text"></span> Articles</a>
                    </li>
                    <li @if(Request::is('companies', 'companies/1/edit')) class="active" @endif>
                        <a href="{!! url('comments') !!}"><span class="fa fa-comment-o"></span> Comments</a>
                    </li>
                    <li @if(Request::is('companies', 'companies/1/edit')) class="active" @endif>
                        <a href="{!! url('categories') !!}"><span class="fa fa-paperclip"></span> Referensi - Categories</a>
                    </li>
                    <li @if(Request::is('companies', 'companies/1/edit')) class="active" @endif>
                        <a href="{!! url('topics') !!}"><span class="fa fa-quote-right"></span> Referensi - Topics</a>
                    </li>
                    <li @if(Request::is('companies', 'companies/1/edit')) class="active" @endif>
                        <a href="{!! url('offlinewriters') !!}"><span class="fa fa-male"></span> Referensi - Offline Writers</a>
                    </li>
                  </ul>
                </div>
            </div>
      </div>

      <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseorganization"><span class="fa fa-sitemap"></span> Organization</a>
            </div>
            <div id="collapseorganization" class="panel-collapse collapse">
                <div class="panel-body">
                  <ul class="nav nav-sidebar">
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
                </div>
            </div>
      </div>

      <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsesystemadmin"><span class="fa fa-cloud"></span> System Admin</a>
            </div>
            <div id="collapsesystemadmin" class="panel-collapse collapse">
                <div class="panel-body">
                <ul class="nav nav-sidebar">
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
                </div>
            </div>
      </div>

      <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsedatareferensi"><span class="fa fa-folder-open-o"></span> Data Referensi</a>
            </div>
            <div id="collapsedatareferensi" class="panel-collapse collapse">
                <div class="panel-body">
                <ul class="nav nav-sidebar">
                  <li @if(Request::is('timezones', 'timezones/*')) class="active" @endif>
                      <a href="{!! url('timezones') !!}"><span class="fa fa-hourglass"></span> Time Zone</a>
                  </li>
                  <li @if(Request::is('languages', 'languages/*')) class="active" @endif>
                      <a href="{!! url('languages') !!}"><span class="fa fa-microphone"></span> Language</a>
                  </li>
                  <li @if(Request::is('documenttypes', 'documenttypes/*')) class="active" @endif>
                      <a href="{!! url('documenttypes') !!}"><span class="fa fa-paperclip"></span> Document Type</a>
                  </li>
                  <li @if(Request::is('educations', 'educations/*')) class="active" @endif>
                      <a href="{!! url('educations') !!}"><span class="fa fa-graduation-cap"></span> Education</a>
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
                </ul>
                </div>
            </div>
      </div>

      @endif

    </div>
</div>
