<?php
  $fetch = fetchBusiness($conn);
?>
<h4 class="mt-2 mb-4">Business Detail</h4>
    <div class="container">
      <!-- Start: Business DetailForm -->

        <div class="form-row">
          <div class="col-sm-12 col-xl-6">
            <label>Business Name</label>
            <div class="form-group input-group">
              <input id="input1" class="form-control" type="text" placeholder="Business Name" name="business_name" value="<?php echo $fetch['name']; ?>" disabled>
              <div class="input-group-append">
                <button id="clipboardCopy1" class="btn btn-outline-secondary" type="button">Copy</button>
              </div>
            </div>
            </div>
        <div class="col-sm-12 col-xl-6">
          <label>ABN Number</label>
          <div class="form-group input-group">
            <input id="input2" class="form-control" type="text" placeholder="ABN Number" name="business_abn" minlength="11" maxlength="11" value="<?php echo $fetch['abn']; ?>" disabled>
            <div class="input-group-append">
              <button id="clipboardCopy2" class="btn btn-outline-secondary" type="button">Copy</button>
            </div>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-sm-12 col-xl-6">
          <label>Email Address<br></label>
          <div class="form-group input-group">
            <input id="input3" class="form-control" type="email" name="business_email" placeholder="Business Email Address" value="<?php echo $fetch['email']; ?>" disabled>
            <div class="input-group-append">
              <button id="clipboardCopy3" class="btn btn-outline-secondary" type="button">Copy</button>
            </div>
          </div>
        </div>

        <div class="col-sm-12 col-xl-6">
          <label>Phone Number</label>
          <div class="form-group input-group">
            <input id="input4" class="form-control" type="tel" placeholder="Business Phone Number" name="business_phone" minlength="10" maxlength="10" value="<?php echo $fetch['phone']; ?>" disabled>
            <div class="input-group-append">
              <button id="clipboardCopy4" class="btn btn-outline-secondary" type="button">Copy</button>
            </div>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-sm-12 col-xl-12">
          <label>Address (optional)</label>
          <div class="form-group input-group">
            <input id="input5" class="form-control" type="text" placeholder="Address" name="business_address" value="<?php echo $fetch['address']; ?>" disabled>
            <div class="input-group-append">
              <button id="clipboardCopy5" class="btn btn-outline-secondary" type="button">Copy</button>
            </div>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-sm-12 col-xl-12">
          <label>Business Link (optional)</label>
          <div class="form-group input-group">
            <input id="input6" class="form-control" type="text" placeholder="URL Link" name="business_link" value="<?php echo $fetch['url']; ?>" disabled>
            <div class="input-group-append">
              <button id="clipboardCopy6" class="btn btn-outline-secondary" type="button">Copy</button>
            </div>
          </div>
        </div>
      </div>
  </div>

  <script type="text/javascript" language="javascript" class="Copy">
    document.getElementById("clipboardCopy1")
    .onclick = function()
    {
      let text = document.getElementById("input1").value;
      navigator.clipboard.writeText(text)
        .then(() => {
          alert(text +' copied to clipboard');
        })
        .catch(err => {
          alert('Error in copying text: ', err);
        });
    }
    document.getElementById("clipboardCopy2")
    .onclick = function()
    {
      let text = document.getElementById("input2").value;
      navigator.clipboard.writeText(text)
        .then(() => {
          alert(text +' copied to clipboard');
        })
        .catch(err => {
          alert('Error in copying text: ', err);
        });
    }
    document.getElementById("clipboardCopy3")
    .onclick = function()
    {
      let text = document.getElementById("input3").value;
      navigator.clipboard.writeText(text)
        .then(() => {
          alert(text +' copied to clipboard');
        })
        .catch(err => {
          alert('Error in copying text: ', err);
        });
    }
    document.getElementById("clipboardCopy4")
    .onclick = function()
    {
      let text = document.getElementById("input4").value;
      navigator.clipboard.writeText(text)
        .then(() => {
          alert(text +' copied to clipboard');
        })
        .catch(err => {
          alert('Error in copying text: ', err);
        });
    }
    document.getElementById("clipboardCopy5")
    .onclick = function()
    {
      let text = document.getElementById("input5").value;
      navigator.clipboard.writeText(text)
        .then(() => {
          alert(text +' copied to clipboard');
        })
        .catch(err => {
          alert('Error in copying text: ', err);
        });
    }
    document.getElementById("clipboardCopy6")
    .onclick = function()
    {
      let text = document.getElementById("input6").value;
      navigator.clipboard.writeText(text)
        .then(() => {
          alert( text +' copied to clipboard');
        })
        .catch(err => {
          alert('Error in copying text: ', err);
        });
    }
  </script>
