function printPageArea(areaID, pageTitle) {
  var printContent = document.getElementById(areaID);
  var WinPrint = window.open("", "PRINT", "width=900,height=650");
  WinPrint.document.write(`<html><head><title>${pageTitle}</title>`);
  WinPrint.document.write(
    "<link href='assets/css/lib/bootstrap.min.css' rel='stylesheet' type='text/css' media='all'/>"
  );
  WinPrint.document.write(
    "<link rel='stylesheet' type='text/css' href='assets/css/style.css' media='all'/>"
  );
  WinPrint.document.write(
    "<style type='text/css' media='all'>@media print { body{width:100%;background:rgba(211, 218, 232,0.4); height:100%; margin:0;padding:0;display:flex;justify-content:center;align-items:stretch;} #invoice{margin:15px !important; border-radius:10px; width:100%;} .table-responsive{overflow:hidden !important}}@page {size: Letter landscape;margin: 0%;}body{overflow:hidden}</style>"
  );
  WinPrint.document.write("</head><body>");
  WinPrint.document.write(printContent.innerHTML);
  WinPrint.document.write("</body></html>");
  WinPrint.document.close();
  WinPrint.focus();
  setTimeout(function () {
    WinPrint.print();
    WinPrint.close();
  }, 1000);
  return false;
}
