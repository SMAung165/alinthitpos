function notiLangSetter(langObj) {
  const MSG = document.querySelectorAll(".msg");
  MSG.forEach((element) => {
    if (element.childElementCount > 0) {
      Array.from(element.children).forEach((element) => {
        function changeLang(msgObj) {
          element.textContent = msgObj;
        }
        var msgText = element.className;
        switch (msgText) {
          case "insert-S":
            changeLang(langObj.insert_S);
            break;
          case "update-S":
            changeLang(langObj.update_S);
            break;
          case "delete-S":
            changeLang(langObj.delete_S);
            break;
          case "pass-update-S":
            changeLang(langObj.pass_update_S);
            break;
          case "sys-reset-S":
            changeLang(langObj.sys_reset_S);
            break;
          case "em-S":
            changeLang(langObj.em_S);
            break;
          case "wrong-pass":
            changeLang(langObj.wrong_pass);
            break;
          case "pls-enter-pass":
            changeLang(langObj.pls_enter_pass);
            break;
          case "cant-del-acc-using":
            changeLang(langObj.cant_del_acc_using);
            break;
          case "must-hv-one-admin":
            changeLang(langObj.must_hv_one_admin);
            break;
          case "will-del-related-em":
            changeLang(langObj.will_del_related_em);
            break;
          case "loss-of-data":
            changeLang(langObj.loss_of_data);
            break;
          case "curr-pass-unmatch":
            changeLang(langObj.curr_pass_unmatch);
            break;
          case "pass-cant-hv-space":
            changeLang(langObj.pass_cant_hv_space);
            break;
          case "pass-hv-least-8":
            changeLang(langObj.pass_hv_least_8);
            break;
          case "new-pass-unmatch":
            changeLang(langObj.new_pass_unmatch);
            break;
          case "new-pass-cant-b-old-pass":
            changeLang(langObj.new_pass_cant_b_old_pass);
            break;
          case "this-dv":
            changeLang(langObj.this_dv);
            break;
          case "is-ls-on":
            changeLang(langObj.is_ls_on);
            break;
          case "extra-mm":
            changeLang(langObj.extra_mm);
            break;
          case "email-not-reg":
            changeLang(langObj.email_not_reg);
            break;
          case "wrong-otp":
            changeLang(langObj.wrong_otp);
            break;
          case "user-not-exist":
            changeLang(langObj.user_not_exist);
            break;
          case "hvnt-activate-acc":
            changeLang(langObj.hvnt_activate_acc);
            break;
        }
      });
    }
  });
}
function setLangForNoti() {
  if (localLanguage == "mm") {
    notiLangSetter(mm);
  } else {
    notiLangSetter(en);
  }
}
