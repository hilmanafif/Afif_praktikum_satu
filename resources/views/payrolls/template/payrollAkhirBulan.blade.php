<table class="slip">
	<thead>
		<tr>
			<th colspan="2">Daftar Penghasilan</td>
			<th colspan="5">Daftar Potongan</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="attr">Gaji Pokok</td>
			<td class="outl nominal">{{number_format($payroll->gapok,0,',','.')}}</td>
		    <td class="attr">BPJS Kesehatan</td>
			<td class="outl nominal">{{number_format($payroll->bpjskes,0,',','.')}}</td>
			<td class="attr">BTN</td>
			<td class="outl"><div style="min-width:100px"></div></td>
			<td class="attr2">Ke <b>X</b> Sisa <b>Y</b></td>
		</tr>
		<tr>
			<td class="attr">Tunjangan Istri</td>
			<td class="outl nominal">{{number_format($payroll['tunjanganIstri'],0,',','.')}}</td>
			<td class="attr">BPJS KT</td>
			<td class="outl nominal">{{number_format($payroll->bpjs,0,',','.')}}</td>
			<td class="attr">Kendaraan</td>
			<td class="outl"></td>
			<td class="attr2">Ke <b>X</b> Sisa <b>Y</b></td>
		</tr>
		<tr>
			<td class="attr">Tunjangan Anak</td>
			<td class="outl nominal">{{number_format($payroll['tunjanganAnak'],0,',','.')}}</td>
			<td class="attr">BPJS Pensiun</td>
			<td class="outl nominal">{{number_format($payroll->bpjspensiun,0,',','.')}}</td>
			<td class="attr">Kop. Rutin</td>
			<td class="outl nominal">{{number_format($payroll->pinjrutin,0,',','.')}}</td>
			<td class="attr2">Ke <b>X</b> Sisa <b>Y</b></td>
		</tr>
		<tr>
			<td class="attr">Natura</td>	
			<td class="outl nominal">{{number_format($payroll['natura'],0,',','.')}}</td>
			<td class="attr">Dapenma</td>
			<td class="outl nominal">{{number_format($payroll->dapenma,0,',','.')}}</td>
			<td class="attr">Kop. Perum</td>
			<td class="outl nominal">{{number_format($payroll->pinjperum,0,',','.')}}</td>
			<td class="attr2">Ke <b>X</b> Sisa <b>Y</b></td>
		</tr>
		<tr>
			<td class="attr">Honor</td>
			<td class="outl"></td>
			<td class="attr">Hutang Pegawai</td>
			<td class="outl nominal">{{number_format($payroll->utangpeg,0,',','.')}}</td>
			<td class="attr">Kop. Kredit</td>
			<td class="outl"></td>
			<td class="attr2">Ke <b>X</b> Sisa <b>Y</b></td>
		</tr>
		<tr>
			<td class="attr3">Sub Total A</td>
			<td class="attr3 nominal">{{number_format($payroll->subtotalA,0,',','.')}}</td>
			<td class="attr">ZIS</td>
			<td class="outl nominal">{{number_format($payroll->zakat,0,',','.')}}</td>
			<td class="attr">BJB</td>
			<td class="outl nominal">{{number_format($payroll->bjb,0,',','.')}}</td>
			<td class="attr2">Ke <b>X</b> Sisa <b>Y</b></td>
		</tr>
		<tr>
			<td class="attr">Tunjangan Jabatan</td>
			<td class="outl nominal">{{number_format($payroll['tunjanganJabatan'],0,',','.')}}</td>
			<td class="attr">Iuran DW</td>
			<td class="outl nominal">{{number_format($payroll->iurandw,0,',','.')}}</td>
			<td class="attr">Waserda</td>
			<td class="outl nominal">{{number_format($payroll->warung,0,',','.')}}</td>
		</tr>
		<tr>
			<td class="attr">Tunjangan Kinerja</td>
			<td class="outl nominal">{{number_format($payroll['tunjanganKinerja'],0,',','.')}}</td>
			<td class="attr">Iuran Koperasi</td>
			<td class="outl"></td>
			<td  class="attr" colspan="3" rowspan="6" style="text-align:center;">
				<p>&nbsp;</p>
				<p>{{ App\Models\Company::find(1)->city }}, {{date("d F Y")}}</p>
				<p>{{ App\Models\Company::find(1)->officer_position }}</p>
				<br /><br /><br /><br /><br />
				<p>{{ App\Models\Company::find(1)->officer_name }}</p>
			</td>
		</tr>
		<tr>
			<td class="attr">Tunjangan Pelaksana</td>
			<td class="outl nominal">{{number_format($payroll['tunjanganPelaksana'],0,',','.')}}</td>
			<td class="attr">Inkop Pamsi</td>
			<td class="outl"></td>
		</tr>
		<tr>
			<td class="attr">Tunjangan Kendaraan</td>
			<td class="outl nominal">{{number_format($payroll['tunjanganKendaraan'],0,',','.')}}</td>
			<td class="attr">Lain-lain</td>
			<td class="outl nominal">{{number_format($payroll->potlain,0,',','.')}}</td>
		</tr>
		<tr>
			<td class="attr">Pajak</td>
			<td class="outl"></td>
			<td class="attr">PPh 21</td>
			<td class="outl"></td>
		</tr>
		<tr>
			<td class="attr3">Sub Total B</td>
			<td class="attr3 nominal">{{number_format($payroll['subtotalB'],0,',','.')}}</td>
			<td class="attr3">Total Potongan</td>
			<td class="attr3 nominal">{{number_format($payroll->totalPotongan,0,',','.')}}</td>
		</tr>
		<tr>
			<td class="attr total">Total Penghasilan</td>
			<td class="outl nominal total" style="font-weight:bold;">{{number_format($payroll->totalPenghasilan,0,',','.')}}</td>
			<td class="attr" colspan="2"></td>
		</tr>
		<tr>
			<td class="attr" colspan="2"></td>
			<td class="nett">Gaji Bersih</td>
			<td class="nett nominal">{{number_format($payroll->gajiBersih,0,',','.')}}</td>
		</tr>
	</tbody>
</table>