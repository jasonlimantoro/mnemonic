<footer class="col-xs-12">
  <div class="row row-center">
    <div class="col-xs-12 col-center disclaimer-section">
      <ul>
        <li><a target="_blank" href="http://mnemonic.co.id/page/term-conditions/kebijakan-privasi">Kebijakan & Privasi</a></li>
        <li><a target="_blank" href="http://mnemonic.co.id/page/term-conditions/syarat-ketentuan">Syarat & Ketentuan</a></li>
        <li><a target="_blank" href="http://mnemonic.co.id/page/term-conditions/hak-cipta">Hak Cipta &copy; Mnemonic</a></li>
      </ul>
    </div>
  </div>

  <div class="row row-center">
    <div class="col-xs-12 col-center contact-us-section">
      <ul>
        <li><a target="_blank" href="http://mnemonic.co.id/page/tentang-kami/mnemonic-indonesia">Tentang Kami</a></li>
        <li><a target="_blank" href="http://mnemonic.co.id/contact">Hubungi Kami</a></li>
        <li><a target="_blank" href="http://mnemonic.co.id/">Mnemonic Website</a></li>
      </ul>
    </div>
  </div>

  <div class="row row-center">
    <div class="col-xs-12 col-center social-media-section">
      <ul>
        @php $social = $settings['site-social'] @endphp
        <li><a href="{{ isset($social->facebook) ? $social->facebook : '' }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="{{ isset($social->twitter) ? $social->twitter : '' }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="{{ isset($social->instagram) ? $social->instagram : '' }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
        <li><a href="tel:+6282230470088" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
        <li><a href="{{ isset($social->telegram) ? $social->telegram : '' }}"><i class="fa fa-telegram"></i></a></li>
        <li><a href="sms:+6282230470088" target="_blank"><i class="fa fa-envelope"></i></a></li>
        <li><a href="tel:+6282230470088" target="_blank"><i class="fa fa-phone"></i></a></li>
        <li><a href="{{ isset($social->line) ? $social->line : '' }}" target="_blank"><i class="fa fa-comment"></i></a></li>
        <li><a href="bbmi://D8F078B9" target="_blank"><i class="fa fa-comments-o"></i></a></li>
      </ul>
    </div>
  </div>
</footer>