
$(document).ready(function () {
  // Elementos do modelo de objetos do documento - DOM
  DOM = {
    chart: $("#chart-sales")[0],
    navMenu: $(".js-nav-menu"),
    alertBox: $(".js-alert-box"),
    arrowDownButton: $(".js-arrow-down-button"),
    alertCloseButton: $(".js-alert-close-button"),
    inputs: {
      CEP: $("[data-input='CEP']"),
      CPF: $("[data-input='CPF']"),
      date: $("[data-input='date']"),
      preco: $("[data-input='preco']"),
      telefone: $("[data-input='telefone']")
    }
  }

  const bindEvents = function () {
    DOM.arrowDownButton.on("click", toggleNavMenu);
    $(document).on("click", handleDocumentClick);
    DOM.alertCloseButton.on("click", closeAlertBox)

    setTimeout(hideAlert, 4 * 1000);
  }

  const bindMasks = function () {
    DOM.inputs.CEP.mask("00000-000");
    DOM.inputs.CPF.mask("000.000.000-00");
    DOM.inputs.date.mask("00/00/0000");
    DOM.inputs.telefone.mask("(00) 0000-0000");
    DOM.inputs.preco.mask("0##.00");
  }

  const toggleNavMenu = function () {
    !DOM.navMenu.hasClass("active") ?
      DOM.navMenu.show().addClass("active") :
      DOM.navMenu.fadeOut(100).removeClass("active");
  }

  const handleDocumentClick = function (e) {
    if (!$(e.target).hasClass("js-arrow-down-button") &&
      !$(e.target).parent().hasClass("js-nav-menu") &&
      !$(e.target).parent().parent().hasClass("js-nav-menu")) {
      if (DOM.navMenu.hasClass("active"))
        DOM.navMenu.fadeOut(100).removeClass("active");
    }
  }

  const hideAlert = function () { DOM.alertBox.hide(); }

  const closeAlertBox = function () {
    $(this).parent().hide().delay(100).remove();
  }

  const renderChart = function() {
    var ctx = DOM.chart.getContext("2d");

    var gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(36,221,172,1)');   
        gradient.addColorStop(1, 'rgba(12,235,235,0.2)');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Out", "Set", "Nov", "Dez"],
          datasets: [{
                label: "Vendas 2018",
                data: [12, 19, 3, 5, 2, 3, 15, 5, 10, 8, 7, 10],
                borderWidth: 7,
                backgroundColor: gradient
          }]
        }
    });
  }

  const init = function () {
    bindEvents();
    bindMasks();
    renderChart();
  }

  init();
});