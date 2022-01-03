import $ from 'jquery';
import "inputmask/dist/inputmask/jquery.inputmask";

export function bind_fio_mask(inputEl, regexMask = /[^a-zA-Zа-яА-ЯёЁ \-]/g) {
  $(inputEl).on('input', function(){
    const regexp = regexMask;
    if($(this).val().match(regexp)){
      $(this).val( $(this).val().replace(regexp,'') );
    }
  });
}

export function bind_number_field(inputEl, regexMask = /[^0-9]/g) {
  $(inputEl).on('input', function(){
    const regexp = regexMask;
    if($(this).val().match(regexp)){
      $(this).val( $(this).val().replace(regexp,'') );
    }
  });
}

export function bind_phone_mask(inputEl, regexMask, placeholder) {
  if (regexMask == null) {
    regexMask = "^\\+7 \\([3489]\\d\\d\\) \\d\\d\\d \\d\\d \\d\\d$";
  }
  if (placeholder == null) {
    placeholder = "+7 (___) ___ __ __";
  }
  const $input = $(inputEl);
  $input.inputmask({
    showMaskOnHover: false,
    showMaskOnFocus: true,
    regex: regexMask,
    placeholder: placeholder,
    postValidation: function(buffer, pos, currentResult, opts) {
      const nums = buffer.join("").replace(/[^0-9]+/g, "");
      const hasSevenNumbersInARow = /(\d)\1{6}/g.test(nums);
      return !hasSevenNumbersInARow;
    }
  });
  $input.on("input", function(event) {
    const val = $(this).val();
    if (val.replace(/[^0-9]+/g, "") === "789") {
      $(this).val("79");
    }
  });
}

export function validate_phone(value, regex) {
  if (value == null) {
    value = "";
  }
  if (regex == null) {
    regex = /^\+7 \([3489]\d\d\) \d\d\d \d\d \d\d$/g;
  }
  const nums = value.replace(/[^0-9]+/g, "");
  return regex.test(value) && !/(\d)\1{6}/g.test(nums);
}

// !experimental function
export function validate_phone_without_default_code(value, regex) {
  if (value == null) {
    value = "";
  }
  if (regex == null) {
    regex = /^(\+7|8) \([3489]\d\d\) \d\d\d \d\d \d\d$/g;
  }
  const nums = value.replace(/[^0-9]+/g, "");
  return regex.test(value) && !/(\d)\1{6}/g.test(nums);
}
