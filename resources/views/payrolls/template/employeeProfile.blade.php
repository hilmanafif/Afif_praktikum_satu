<table class="slip" style="margin-top:-40px;">
  <tr>
	<td colspan="6" class="attr">&nbsp;</td>
	<td class="attr" rowspan="4" style="max-width:90px;">
		@if (app('request')->input('payrolltype')=='1')
		<img src="{{url('foto/'.str_replace(' ','',$payroll->users->employee_number).'.png')}}" style="border:1px solid #000;width:110px;" class="img-responsive center-block" />
		@else
		<!--<img src="file:///D:\laravel_jerbeehrm\public\foto\{{ str_replace(' ','',$payroll->users->employee_number) }}.png" style="border:2px solid #ddd;width:80%;" class="img-responsive center-block" />-->
		<img src="/var/app/public/foto/{{ str_replace(' ','',$payroll->users->employee_number) }}.png" style="border:1px solid #ddd;width:110px;" class="img-responsive center-block" />
		@endif
    </td>
  </tr>
  <tr>
    <td class="attr">NIPP</td>
    <td class="outl content">{{$payroll->users->employee_number}}</td>
    <td class="attr">Wilayah</td>
    <td class="outl content">{{$payroll->users->wilayahs->name}}</td>
    <td class="attr">Kode Jabatan</td>
    <td class="outl content">{{isset($payroll->users->jabatans->kode)?$payroll->users->jabatans->kode:"Tidak Diketahui"}}</td>
  </tr>
  <tr>
    <td class="attr">Nama</td>
    <td class="outl content">{{$payroll->name}}</td>
    <td class="attr">Gol/Ruang</td>
    <td class="outl content">{{$payroll->users->pangkats->kode}}/{{$payroll->users->ruang}}</td>
    <td class="attr">Kode Wilayah</td>
    <td class="outl content">{{$payroll->users->wilayahs->kode}}</td>
  </tr>
  <tr>
    <td class="attr">Kota</td>
    <td class="outl content">{{$payroll->users->wilayahs->name}}</td>
    <td class="attr">Jabatan</td>
    <td colspan="3" class="outl content">{{ $payroll->jabatan }}</td>
  </tr>
</table>