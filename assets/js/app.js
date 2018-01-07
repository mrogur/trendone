/*import '../scss/nav.scss';
import '../scss/app.scss';
import '../scss/media.scss';
import '../scss/contact-form.scss';*/
import "font-awesome-webpack";
import '../scss/main.scss';
import "font-awesome-webpack";

$("#sliderNews").on('slid.bs.carousel', function () {
    $(".slide-description").removeClass("d-block");
    let id = $(this).find(".active").data("slideId");
    $("#sliderNews"+id).fadeIn("slow").addClass("d-block");
});