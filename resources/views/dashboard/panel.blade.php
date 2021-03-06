<div class="container">
    <div class="panel-group" id="accordion">

      <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{!! url('dashboard') !!}"><span class="fa fa-dashboard"></span> Dashboard</a>
            </div>
      </div>

      @if (Gate::allows('role',['admin','member']))
      <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapsecontent"><span class="fa fa-newspaper-o"></span> CMS</a>
            </div>
            <div id="collapsecontent" class="panel-collapse collapse">
                <div class="panel-body">
                  <ul class="nav nav-sidebar">
                    <!--
                    <li>
                        <a href="{!! url('comments') !!}"><span class="fa fa-comment-o"></span> Comments</a>
                    </li>
                    -->
                    <li>
                        <a href="{!! url('topics') !!}"><span class="fa fa-quote-right"></span> Topics</a>
                    </li>
                    <li>
                        <a href="{!! url('categories') !!}"><span class="fa fa-paperclip"></span> Category</a>
                    </li>
                    <li>
                        <a href="{!! url('offlinewriters') !!}"><span class="fa fa-male"></span> Non-user Writer</a>
                    </li>
                  </ul>
                </div>
            </div>
      </div>
      @endif

      @if (Gate::allows('role','admin'))

      <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseorganization"><span class="fa fa-sitemap"></span> Organization</a>
            </div>
            <div id="collapseorganization" class="panel-collapse collapse">
                <div class="panel-body">
                  <ul class="nav nav-sidebar">
                    <li>
                        <a href="{!! url('companies/1/edit') !!}"><span class="fa fa-building"></span> General Info</a>
                    </li>
                    <li>
                        <a href="{!! url('departments') !!}"><span class="fa fa-users"></span> Departments</a>
                    </li>
                    <li>
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
                  <li>
                      <a href="{!! url('logsystems') !!}"><span class="fa fa-database"></span> Log</a>
                  </li>
                  <li>
                      <a href="{!! url('admin/users') !!}"><span class="fa fa-users"></span> Users</a>
                  </li>
                  <li>
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
                  <li>
                      <a href="{!! url('timezones') !!}"><span class="fa fa-hourglass"></span> Time Zone</a>
                  </li>
                  <li>
                      <a href="{!! url('languages') !!}"><span class="fa fa-microphone"></span> Language</a>
                  </li>
                  <li>
                      <a href="{!! url('documenttypes') !!}"><span class="fa fa-paperclip"></span> Document Type</a>
                  </li>
                  <!--
                  <li>
                      <a href="{!! url('educations') !!}"><span class="fa fa-graduation-cap"></span> Education</a>
                  </li>
                  <li>
                      <a href="{!! url('skills') !!}"><span class="fa fa-plug"></span> Skill</a>
                  </li>
                  <li>
                      <a href="{!! url('employmentstatuses') !!}"><span class="fa fa-rocket"></span> Employment Status</a>
                  </li>
                  <li>
                      <a href="{!! url('jobtitles') !!}"><span class="fa fa-legal"></span> Job Title</a>
                  </li>
                  <li>
                      <a href="{!! url('salarycomponents') !!}"><span class="fa fa-money"></span> Salary Component</a>
                  </li>
                  <li>
                      <a href="{!! url('leavetypes') !!}"><span class="fa fa-hotel"></span> Leave Type</a>
                  </li>
                  -->
                </ul>
                </div>
            </div>
      </div>

      @endif

    </div>
</div>
