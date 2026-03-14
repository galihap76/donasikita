@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'DonasiKita')
<img src="{{ asset('assets/img/banner-logo.png') }}" class="logo" alt="Logo DonasiKita">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
