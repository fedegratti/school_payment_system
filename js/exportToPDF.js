/**
 * Created by Skeith on 30/10/2015.
 */


function saveAsPDF(domElementToExport)
{

    var pdf = new jsPDF('portrait', 'pt', 'a4');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#'.concat(domElementToExport))[0];

    // we support special element handlers. Register them with jQuery-style
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of selectors
    // (class, of compound) at this time.
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypass_pdf': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
        source, // HTML string or DOM elem ref.
        margins.left, // x coord
        margins.top, { // y coord
            'width': margins.width, // max width of content on PDF
            'elementHandlers': specialElementHandlers
        },

        function (dispose) {
            // dispose: object with X, Y of the last line add to the PDF
            //          this allow the insertion of new lines after html
            var canvas = document.getElementsByTagName("canvas")[0];
            if(canvas != null)
            {
                var imgData = canvas.toDataURL("image/jpeg",1.0);
                pdf.addImage(imgData, 'JPEG', 5, 200,canvas.width/2,canvas.height/2);
            }

            pdf.save('document.pdf');
        }, margins);
}
