$(document).ready(function () {
  //console.log("jQuery strādā!")
  let edit = false;
  fetchPieteikumi();
  fetchJauniPieteikumi();
  fetchPieprKursi();
  fetchKursi();
  fetchLietotaji();
  fetchLogs();

  function fetchPieteikumi() {
    $.ajax({
      url: "crud/pieteikumi-list.php",
      type: "GET",
      success: function (response) {
        const pieteikumi = JSON.parse(response);
        let template = "";
        pieteikumi.forEach((pieteikums) => {
          template += `
                        <tr kursaID ="${pieteikums.id}">
                            <td>${pieteikums.id}</td>
                            <td>${pieteikums.vards}</td>
                            <td>${pieteikums.uzvards}</td>
                            <td>${pieteikums.epasts}</td>
                            <td>${pieteikums.talrunis}</td>
                            <td>${pieteikums.kurss}</td>
                            <td>${pieteikums.statuss}</td>
                            <td>
                                <a href="#" class="pieteikums-item btn-edit"><i class="fa fa-edit"></i></a> 
                                <a href="#" class="pieteikums-delete btn-delete"><i class="fa fa-trash"></i></a> 
                            </td>
                        </tr>
                    `;
        });

        $("#pieteikumi").html(template);
      },
    });
  }

  function fetchKursi() {
    $.ajax({
      url: "crud/kursi-list.php",
      type: "GET",
      success: function (response) {
        const kursi = JSON.parse(response);
        let template = "";
        kursi.forEach((kurss) => {
          const limitedApraksts =
            kurss.apraksts.length > 85
              ? kurss.apraksts.substring(0, 85) + "..."
              : kurss.apraksts;

          const isChecked = kurss.statuss == 1 ? "checked" : "";

          template += `
                        <tr kursaID ="${kurss.id}">
                            <td>${kurss.id}</td>
                            <td>${kurss.nosaukums}</td>
                            <td>${limitedApraksts}</td>
                            <td>${kurss.attels}</td>
                            <td>
                                <a href="#" class="kurss-item btn-edit"><i class="fa fa-edit"></i></a> 
                                <input type="checkbox" class="kurss-statuss btn-status" ${isChecked} disabled>
                            </td>
                        </tr>
                    `;
        });

        $("#kursi").html(template);
      },
    });
  }

  function fetchLietotaji() {
    $.ajax({
      url: "crud/lietotaji-list.php",
      type: "GET",
      success: function (response) {
        const pieteikumi = JSON.parse(response);
        let template = "";
        pieteikumi.forEach((lietotajs) => {
          let buttonHtml =
            lietotajs.statuss === "0"
              ? "<b>dzēsts</b>"
              : `
              <a href="#" class="lietotajs-item btn-edit"><i class="fa fa-edit"></i></a>
              <a href="#" class="lietotajs-delete btn-delete"><i class="fa fa-trash"></i></a>
              `;

          template += `
              <tr lietotajsID="${lietotajs.id}">
                  <td>${lietotajs.id}</td>
                  <td>${lietotajs.lietotajvards}</td>
                  <td>${lietotajs.vards}</td>
                  <td>${lietotajs.uzvards}</td>
                  <td>${lietotajs.epasts}</td>
                  <td>${lietotajs.loma}</td>
                  <td>${lietotajs.reg_datums}</td>
                  <td>     
                      ${buttonHtml} 
                  </td>
              </tr>
          `;
        });

        $("#lietotaji").html(template);
      },
    });
  }

  function fetchLogs() {
    $.ajax({
      url: "crud/logs-list.php",
      type: "GET",
      success: function (response) {
        const pieteikumi = JSON.parse(response);
        let template = "";
        pieteikumi.forEach((loga) => {
          template += `
              <tr logaID="${loga.id}">
                <td>${loga.laiks}</td>
                <td>${loga.lietotajs}</td>
                <td>${loga.darbiba}</td>
              </tr>
          `;
        });

        $("#logs").html(template);
      },
    });
  }

  function fetchJauniPieteikumi() {
    $.ajax({
      url: "crud/pieteikumi-list.php",
      type: "GET",
      success: function (response) {
        const pieteikumi = JSON.parse(response);
        let template = "";

        let count = 0;

        pieteikumi.forEach((pieteikums) => {
          if (count < 7) {
            template += `
                            <tr kursaID ="${pieteikums.id}">
                                <td>${pieteikums.vards} ${pieteikums.uzvards}</td>
                                <td>${pieteikums.kursa_nos}</td>
                                <td>${pieteikums.statuss}</td>
                            </tr>
                        `;
            count++;
          }
        });

        $("#jaun-piet-table").html(template);
      },
    });
  }

  function fetchPieprKursi() {
    $.ajax({
      url: "crud/kursi-list.php",
      type: "GET",
      success: function (response) {
        const kursi = JSON.parse(response);
        let template = "";
        kursi.forEach((kurss) => {
          template += `
                        <tr kursaID ="${kurss.id}">
                            <td>${kurss.nosaukums}</td>
                            <td>${kurss.pieteikumi}</td>
                        </tr>
                    `;
        });

        $("#piepr-kursi-table").html(template);
      },
    });
  }

  /* PIETEIKUMI */

  $(document).on("click", ".pieteikums-item", (e) => {
    $(".modal").css("display", "flex");
    const element = $(this)[0].activeElement.parentElement.parentElement;
    console.log(element);
    const id = $(element).attr("kursaID");
    $.post("crud/pieteikums-single.php", { id }, (response) => {
      const pieteikums = JSON.parse(response);
      $("#vards").val(pieteikums.vards);
      $("#uzvards").val(pieteikums.uzvards);
      $("#epasts").val(pieteikums.epasts);
      $("#talrunis").val(pieteikums.talrunis);
      $("#komentars").val(pieteikums.komentars);
      $("#kurss").val(pieteikums.kurss);
      $("#statuss").val(pieteikums.statuss);
      $("#kursaID").val(pieteikums.id);
      edit = true;
    });
    e.preventDefault();
  });

  $("#pieteikumaForma").submit((e) => {
    e.preventDefault();
    const postData = {
      vards: $("#vards").val(),
      uzvards: $("#uzvards").val(),
      epasts: $("#epasts").val(),
      talrunis: $("#talrunis").val(),
      komentars: $("#komentars").val(),
      kurss: $("#kurss").val(),
      statuss: $("#statuss").val(),
      id: $("#kursaID").val(),
    };
    const url =
      edit === false ? "crud/pieteikums-add.php" : "crud/pieteikums-edit.php";
    console.log(postData, url);
    $.post(url, postData, (response) => {
      $("#pieteikumaForma").trigger("reset");
      console.log(response);
      fetchPieteikumi();
      $(".modal").hide();
      edit = false;
    });
  });

  $(document).on("click", "#new", (e) => {
    $(".modal").css("display", "flex");
  });

  $(document).on("click", ".close_modal", (e) => {
    $(".modal").hide();
    edit = false;
    $("#pieteikumaForma").trigger("reset");
  });

  $(document).on("click", ".pieteikums-delete", (e) => {
    if (confirm("Vai tiešām vēlies dzēst šo ierakstu?")) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      //console.log(element)
      const id = $(element).attr("kursaID");
      $.post("crud/pieteikums-delete.php", { id }, (response) => {
        fetchPieteikumi();
      });
    }
  });

  /* KURSI */

  $(document).on("click", ".kurss-item", (e) => {
    $(".modal").css("display", "flex");
    const element = e.currentTarget.parentElement.parentElement;
    console.log(element);
    const id = $(element).attr("kursaID");
    console.log("test".id);
    $.post("crud/kurss-single.php", { id }, (response) => {
      const kurss = JSON.parse(response);
      const isChecked = kurss.statuss == 1;

      $("#nosaukums").val(kurss.nosaukums);
      $("#apraksts").val(kurss.apraksts);
      $("#attels").val(kurss.attels);
      $("#kurss-statuss").prop("checked", isChecked);
      $("#kursaID").val(kurss.id);

      edit = true;
    });
    e.preventDefault();
  });

  $("#kursaPievForma").submit((e) => {
    e.preventDefault();

    const statuss = $("#kurss-statuss").prop("checked") ? 1 : 0;
    const postData = {
      nosaukums: $("#nosaukums").val(),
      apraksts: $("#apraksts").val(),
      attels: $("#attels").val(),
      statuss: statuss,
      id: $("#kursaID").val(),
    };
    const url = edit === false ? "crud/kurss-add.php" : "crud/kurss-edit.php";
    console.log(postData, url);
    $.post(url, postData, (response) => {
      $("#kursaPievForma").trigger("reset");
      console.log(response);
      fetchKursi();
      $(".modal").hide();
      edit = false;
    });
  });

  $(document).on("click", "#newKurss", (e) => {
    $(".modal").css("display", "flex");
  });

  $(document).on("click", ".close_modal", (e) => {
    $(".modal").hide();
    edit = false;
    $("#kursaPievForma").trigger("reset");
  });

  /* LIETOTAJI */

  $("#togglePasswordChange").change(function () {
    if ($(this).is(":checked")) {
      $("#password").removeAttr("disabled");
      $("#password").attr("required", "required");
    } else {
      $("#password").attr("disabled", "disabled");
      $("#password").removeAttr("required");
    }
  });

  function togglePasswordInput(edit) {
    if (edit) {
      $("#togglePasswordChange").closest("#togglePasswordChange").show();
      $("#password").prop("disabled", true);
      $("#password").removeAttr("required");
      $("label[for='password']").text("Mainit paroli");
    } else {
      $("#togglePasswordChange").closest("#togglePasswordChange").hide();
      $("#password").prop("disabled", false);
      $("#password").attr("required", "required");
      $("label[for='password']").text("Parole");
    }
  }

  $(document).on("click", ".lietotajs-item", (e) => {
    $(".modal").css("display", "flex");
    const element = e.currentTarget.parentElement.parentElement;
    console.log(element);
    const id = $(element).attr("lietotajsID");
    $.post("crud/lietotaji-single.php", { id }, (response) => {
      const pieteikums = JSON.parse(response);
      $("#lietotajvards").val(pieteikums.lietotajvards);
      $("#vards").val(pieteikums.vards);
      $("#uzvards").val(pieteikums.uzvards);
      $("#epasts").val(pieteikums.epasts);
      $("#loma").val(pieteikums.loma);
      $("#lietotajsID").val(pieteikums.id);
      edit = true;
      togglePasswordInput(edit);
    });
    e.preventDefault();
  });

  $("#lietotajaForma").submit((e) => {
    e.preventDefault();

    let postData = {
      lietotajvards: $("#lietotajvards").val(),
      vards: $("#vards").val(),
      uzvards: $("#uzvards").val(),
      epasts: $("#epasts").val(),
      loma: $("#loma").val(),
      id: $("#lietotajsID").val(),
    };

    if (!$("#password").prop("disabled")) {
      postData.password = $("#password").val();
    }

    const url =
      edit === false ? "crud/lietotaji-add.php" : "crud/lietotaji-edit.php";
    console.log(postData, url);

    $.post(url, postData, (response) => {
      $("#lietotajaForma").trigger("reset");
      console.log(response);
      fetchLietotaji();
      $(".modal").hide();
      edit = false;
    });
  });

  $(document).on("click", "#new", (e) => {
    $(".modal").css("display", "flex");
    edit = false;
    togglePasswordInput(edit);
  });

  $(document).on("click", ".close_modal", (e) => {
    $(".modal").hide();
    edit = false;
    $("#lietotajaForma").trigger("reset");
  });

  $(document).on("click", ".lietotajs-delete", (e) => {
    if (confirm("Vai tiešām vēlies dzēst šo ierakstu?")) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr("lietotajsID");
      $.post("crud/lietotaji-delete.php", { id }, (response) => {
        fetchLietotaji();
      });
    }
  });

  $("#lietotajaParole").submit((e) => {
    e.preventDefault();

    let postData = {
      newpasswordone: $("#newpasswordone").val(),
      newpasswordtwo: $("#newpasswordtwo").val(),
      password: $("#password").val(),
      id: $("#lietotajsID").val(),
      message: $(".kluda").val(),
    };

    const url = "crud/lietotaji-parole.php";
    console.log(postData, url);

    $.post(url, postData, (response) => {
      $("#lietotajaParole").trigger("reset");
      console.log(response);

      $(".kluda").text(response);
    });
  });
});
