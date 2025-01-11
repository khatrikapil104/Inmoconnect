{{-- log-out-modal --}}
<!-- Modal-->
<div class="modal fade" id="showMessageModal" tabindex="-1" role="dialog" aria-labelledby="showMessageModalLabel" aria-hidden="true" style="z-index:9999">
  <div class="modal-dialog modal-width-change_four modal-dialog-centered" role="document">
    <div class="modal-content  border-r-8 border-0 b-color-white p-30">
      <div class="modal-header border-0 justify-content-end p-0">
        <button type="button" class="close b-color-transparent cursor-pointer" data-bs-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Union" fill-rule="evenodd" clip-rule="evenodd" d="M8 10.0544L2.05438 16L0 13.9456L5.94561 8L6.64978e-06 2.05438L2.05439 0L8 5.94561L13.9456 0L16 2.05438L10.0544 8L16 13.9456L13.9456 16L8 10.0544Z" fill="black" fill-opacity="0.5"/>
             </svg>
          </span>
        </button>
      </div>
      <div class="modal-body p-0 text-center mt10">
          <div class="modal-body-text">
            <i class="icon-success-icon modalIcons text60" height="60" width="60" style="display:none;"></i>
            <i class="icon-error-icon modalIcons text60" height="60" width="60" style="display:none;"></i>
            <i class="icon-warning-icon modalIcons text60" height="60" width="60" style="display:none;"></i>
            <i class="icon-error-icon1 modalIcons text60" height="60" width="60" style="display:none;"></i>
              <!-- <svg class="svg-confirm svgIcons" style="display:none;" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M30 60C46.5685 60 60 46.5685 60 30C60 13.4315 46.5685 0 30 0C13.4315 0 0 13.4315 0 30C0 46.5685 13.4315 60 30 60ZM30 55.0769C16.1504 55.0769 4.92308 43.8496 4.92308 30C4.92308 16.1504 16.1504 4.92308 30 4.92308C43.8496 4.92308 55.0769 16.1504 55.0769 30C55.0769 43.8496 43.8496 55.0769 30 55.0769ZM33.2321 25.7705V10.4587H26.9308V25.7705C26.9308 27.3945 27.0123 28.9917 27.1753 30.5622C27.3382 32.1147 27.5465 33.7655 27.8 35.5144H32.363C32.6165 33.7655 32.8247 32.1147 32.9877 30.5622C33.1506 28.9917 33.2321 27.3945 33.2321 25.7705ZM26.1703 43.9466C25.9711 44.4463 25.8716 44.9727 25.8716 45.5259C25.8716 46.097 25.9711 46.6324 26.1703 47.1321C26.3876 47.6139 26.6774 48.0333 27.0395 48.3902C27.4197 48.7471 27.8633 49.0238 28.3703 49.22C28.8774 49.4342 29.4206 49.5413 30 49.5413C30.5613 49.5413 31.0955 49.4342 31.6025 49.22C32.1095 49.0238 32.5441 48.7471 32.9062 48.3902C33.2864 48.0333 33.5852 47.6139 33.8025 47.1321C34.0198 46.6324 34.1284 46.097 34.1284 45.5259C34.1284 44.9727 34.0198 44.4463 33.8025 43.9466C33.5852 43.4469 33.2864 43.0186 32.9062 42.6617C32.5441 42.3048 32.1095 42.0192 31.6025 41.8051C31.0955 41.5909 30.5613 41.4838 30 41.4838C29.4206 41.4838 28.8774 41.5909 28.3703 41.8051C27.8633 42.0192 27.4197 42.3048 27.0395 42.6617C26.6774 43.0186 26.3876 43.4469 26.1703 43.9466Z" fill="#383192"/>
              </svg> -->

              <div class="text-18 lineheight-22 font-weight-700 letter-s-48 color-b-blue opacity-8 pt-30 modal-message"> You are attempting to log out of <br>Inmoconnect.</div>
              <div class="modal-confirm" style="display:none;">

                <div class="text-18 lineheight-22 font-weight-700 letter-s-48 color-primary pt-10 modal-confirm-message">Are you Sure?</div>
                <div class="text-12 font-weight-400 lineheight-15 opacity-5 color-black pt-20 modal-confirm-secondary-text">Logged in as James Henry</div>

                <button type="button" class="gardient-button small-button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-10 modal-confirm-btn-success">Logout</button>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Reset Password  -->
<div class="modal fade" id="showMessageModal2" tabindex="-1" role="dialog" aria-labelledby="showMessageModal2Label" aria-hidden="true">
  <div class="modal-dialog login-modal-email  modal-dialog-centered" role="document">
    <div class="modal-content  border-r-8 border-0 b-color-white p-30">
      <div class="modal-header border-0 justify-content-end p-0">
        <button type="button" class="close b-color-transparent cursor-pointer" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="Union" fill-rule="evenodd" clip-rule="evenodd" d="M8 10.0544L2.05438 16L0 13.9456L5.94561 8L6.64978e-06 2.05438L2.05439 0L8 5.94561L13.9456 0L16 2.05438L10.0544 8L16 13.9456L13.9456 16L8 10.0544Z" fill="black" fill-opacity="0.5"/>
             </svg>
          </span>
        </button>
      </div>
      <div class="modal-body p-0 text-center mt10">
          <div class="modal-body-text">
            <div class="modal-text">
            <img src="{{asset('img/login-logo.png')}}" alt="image" class="">
              <div class="color-black opacity-8 text-32 font-weight-700 lineheight-40 letter-s-64 pt-20 pb-20 message-first">Reset Password Link Sent Successfully</div>
              <div class="color-b-blue text-14 font-weight-400 lineheight-24 letter-s-48 message-second">Hey user, such thing happen to all of us. But we cover you.</div>
              <div class="color-b-blue text-14 font-weight-400 line-height-24 letter-s-48 pt-1 message-third">We have sent the reset password link to your registered email address <a href="#" class="d-block font-weight-700">test@gmail.com</a>please follow the instruction provided in the email. </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>