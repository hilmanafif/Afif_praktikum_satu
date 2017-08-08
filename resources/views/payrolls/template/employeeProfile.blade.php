<table class="table table-bordered">
  <tr>
    <td>NIPP</td>
    <td>{{$payroll->users->employee_number}}</td>

    <td>Wilayah</td>
    <td>{{$payroll->users->wilayahs->name}}</td>

    <td>Kode Jabatan</td>
    <td>{{isset($payroll->users->jabatans->kode)?$payroll->users->jabatans->kode:"Tidak Diketahui"}}</td>

    <td rowspan="3" style="max-width:100px;">
      @if (app('request')->input('payrolltype')=='1')
      <img src="{{url('foto/'.str_replace(' ','',$payroll->users->employee_number).'.png')}}" style="width:100px;" class="img-responsive center-block">
      @else
      <img src="/var/www/html/app/public/foto/{{ str_replace(' ','',$payroll->users->employee_number) }}.png" style="width:100px;" class="img-responsive center-block">
      @endif
    </td>

  </tr>
  <tr>
    <td>Nama</td>
    <td>{{$payroll->name}}</td>

    <td>Gol/Ruang</td>
    <td>{{$payroll->users->pangkats->kode}}/{{$payroll->users->ruang}}</td>

    <td>Kode Wilayah</td>
    <td>{{$payroll->users->wilayahs->kode}}</td>
  </tr>
  <tr>
    <td>Kota</td>
    <td>{{$payroll->users->wilayahs->name}}</td>

    <td>Jabatan</td>
    <td colspan="3">{{ $payroll->jabatan }}</td>
  </tr>
</table>
