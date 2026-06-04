<?php


use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\EnquiryController;
use App\Http\Controllers\admin\IndustryController;
use App\Http\Controllers\admin\IndustryFaqController;
use App\Http\Controllers\admin\IndustryFeatureController;
use App\Http\Controllers\admin\IndustryServiceController;
use App\Http\Controllers\admin\ServiceBenefitController;
use App\Http\Controllers\admin\ServiceCategoryController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\ServiceEssentialController;
use App\Http\Controllers\admin\ServiceFaqController;
use App\Http\Controllers\admin\ServiceFeatureController;
use App\Http\Controllers\admin\ServiceSubCategoryController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TeamMemberController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\WhyChooseUsController;
use App\Http\Controllers\admin\BeforeAfterImageController;
use App\Http\Controllers\admin\CertificationController;
use App\Http\Controllers\admin\BecomePartnerAdminController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\Frontend\BecomePartnerController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Http\Controllers\Frontend\QuoteController;
use App\Http\Controllers\admin\AppointmentAdminController;
use App\Http\Controllers\admin\QuoteAdminController;
use Illuminate\Support\Facades\Route;

// Sitemap
Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Frontend Routes
Route::get('become-a-partner',[BecomePartnerController::class,'index'])->name('home.become-a-partner');
Route::post('/become-partner/store',[BecomePartnerController::class,'store'])->name('become-partner.store');

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('about-us',[HomeController::class,'about'])->name('home.about-us');
Route::get('about',[HomeController::class,'about'])->name('home.about');
Route::get('contact-us',[HomeController::class,'contact'])->name('home.contact-us');
Route::get('blog',[HomeController::class,'blog'])->name('home.blog');
Route::get('blog/{slug}',[HomeController::class,'blog_details'])->name('home.blog-details');
Route::get('projects',[HomeController::class,'blog'])->name('home.projects');
Route::get('services', [HomeController::class, 'services'])->name('home.services');
Route::get('services/{slug}', [HomeController::class, 'serviceDetail'])->name('home.service-detail');
Route::get('faq',[HomeController::class,'faq'])->name('home.faq');
Route::get('pricing',[HomeController::class,'pricing'])->name('home.pricing');
Route::get('gallery',[HomeController::class,'gallery'])->name('home.gallery');
Route::get('team', [HomeController::class, 'team'])->name('home.team');
Route::get('testimonials', [HomeController::class, 'testimonials'])->name('home.testimonials');

Route::post('/contact-store', [ContactController::class, 'store'])->name('contact.store');
Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');
Route::post('/quote/store', [QuoteController::class, 'store'])->name('quote.store');

// User Account Routes
Route::group(['prefix' => 'account'], function() {
    Route::group(['middleware' => 'guest'], function() {
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::get('register',[LoginController::class,'register'])->name('account.register');
        Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
        Route::post('process-register',[LoginController::class,'process_register'])->name('account.processRegister');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('dashboard',[DashboardController::class,'index'])->name('account.dashboard');
        Route::get('logout',[LoginController::class,'logout'])->name('account.logout');
    });
});

// Admin Routes
Route::group(['prefix' => 'admin'], function() {
    Route::group(['middleware' => 'admin.guest'], function() {
        Route::get('login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function() {
        Route::get('logout',[AdminLoginController::class,'logout'])->name('admin.logout');

        // Settings
        Route::get('settings', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('settings', [SettingController::class, 'update'])->name('admin.settings.update');

        // CMS Pages
        Route::get('cms', [SettingController::class, 'cms'])->name('admin.cms');
        Route::post('cms', [SettingController::class, 'cmsUpdate'])->name('admin.cms.update');

        // Enquiries
        Route::get('/enquiries', [EnquiryController::class, 'index'])->name('admin.enquiries');
        Route::get('/enquiries/count', [EnquiryController::class, 'enquiryCount'])->name('admin.enquiries.count');
        Route::post('/enquiries/mark-read', [EnquiryController::class, 'markAllRead']);
        Route::get('/enquiries/latest', [EnquiryController::class, 'latest']);
        Route::get('/enquiries/search', [EnquiryController::class, 'search'])->name('admin.enquiries.search');
        Route::post('/enquiries/{id}/reply', [EnquiryController::class, 'reply'])->name('admin.enquiries.reply');
        Route::get('/enquiries/export', [EnquiryController::class, 'export'])->name('admin.enquiries.export');
        Route::post('/enquiries/{id}/status', [EnquiryController::class, 'updateStatus'])->name('admin.enquiries.status');
        Route::get('/enquiry-destroy/{id}',[EnquiryController::class,'destroy'])->name('admin.enquiries-destroy');

        // Appointments
        Route::get('appointments', [AppointmentAdminController::class, 'index'])->name('admin.appointments');
        Route::post('appointments/{id}/status', [AppointmentAdminController::class, 'updateStatus'])->name('admin.appointment-status');
        Route::get('appointments-destroy/{id}', [AppointmentAdminController::class, 'destroy'])->name('admin.appointment-destroy');
        Route::get('appointments/count', [AppointmentAdminController::class, 'count'])->name('admin.appointments.count');

        // Quote Requests
        Route::get('quotes', [QuoteAdminController::class, 'index'])->name('admin.quotes');
        Route::post('quotes/{id}/status', [QuoteAdminController::class, 'updateStatus'])->name('admin.quote-status');
        Route::get('quotes-destroy/{id}', [QuoteAdminController::class, 'destroy'])->name('admin.quote-destroy');
        Route::get('quotes/count', [QuoteAdminController::class, 'count'])->name('admin.quotes.count');

        // Become Partner (Admin)
        Route::get('become-partner', [BecomePartnerAdminController::class, 'index'])->name('admin.become-partner');
        Route::get('become-partner/{id}/destroy', [BecomePartnerAdminController::class, 'destroy'])->name('admin.become-partner.destroy');

        // Certifications & Licenses
        Route::get('certifications', [CertificationController::class, 'index'])->name('admin.certifications');
        Route::post('certifications/store', [CertificationController::class, 'store'])->name('admin.certifications.store');
        Route::post('certifications/{id}/update', [CertificationController::class, 'update'])->name('admin.certifications.update');
        Route::get('certifications/{id}/destroy', [CertificationController::class, 'destroy'])->name('admin.certifications.destroy');
        Route::post('certifications/toggle-status', [CertificationController::class, 'toggleStatus'])->name('admin.certifications.status');

        // Before & After Images
        Route::get('before-after', [BeforeAfterImageController::class, 'index'])->name('admin.before-after');
        Route::post('before-after/store', [BeforeAfterImageController::class, 'store'])->name('admin.before-after.store');
        Route::post('before-after/{id}/update', [BeforeAfterImageController::class, 'update'])->name('admin.before-after.update');
        Route::get('before-after/{id}/destroy', [BeforeAfterImageController::class, 'destroy'])->name('admin.before-after.destroy');
        Route::post('before-after/toggle-status', [BeforeAfterImageController::class, 'toggleStatus'])->name('admin.before-after.status');

        // Why Choose Us
        Route::get('why-choose-us', [WhyChooseUsController::class, 'index'])->name('admin.why-choose-us');
        Route::post('why-choose-us/store', [WhyChooseUsController::class, 'store'])->name('admin.why-choose-us-store');
        Route::get('why-choose-us/{id}/edit', [WhyChooseUsController::class, 'edit'])->name('admin.why-choose-us-edit');
        Route::post('why-choose-us/{id}/update', [WhyChooseUsController::class, 'update'])->name('admin.why-choose-us-update');
        Route::get('why-choose-us/{id}/destroy', [WhyChooseUsController::class, 'destroy'])->name('admin.why-choose-us-destroy');
        Route::post('why-choose-us/toggle-status', [WhyChooseUsController::class, 'toggleStatus'])->name('admin.why-choose-us-status');

        // Dashboard
        Route::get('/',[AdminController::class,'index'])->name('admin');

        // Admin Profile
        Route::get('profile',[AdminProfileController::class,'profile'])->name('admin.profile');
        Route::post('profile/update',[AdminProfileController::class,'profile_update'])->name('admin.profile.update');

        // Admin Slider
        Route::get('slider',[SliderController::class,'index'])->name('admin.slider');
        Route::post('slider-add',[SliderController::class,'store'])->name('admin.slider-store');
        Route::post('slider-edit',[SliderController::class,'update'])->name('admin.slider-update');
        Route::get('slider-destroy/{id}',[SliderController::class,'destroy'])->name('admin.slider-destroy');
        Route::post('slider/toggle-status', [SliderController::class, 'slider_toggleStatus'])->name('admin.slider-status');

        // Admin Service
        Route::get('service',[ServiceController::class,'index'])->name('admin.service');
        Route::get('service/subcategories',[ServiceController::class, 'serviceSubcategories'])->name('admin.getservice-subcategories');
        Route::get('service/create',[ServiceController::class,'create'])->name('admin.service-create');
        Route::get('service/{id}/edit',[ServiceController::class,'edit'])->name('admin.service-edit');
        Route::post('service/store',[ServiceController::class,'store'])->name('admin.service-store');
        Route::post('service/{id}/update',[ServiceController::class,'update'])->name('admin.service-update');
        Route::get('service/{id}/destroy',[ServiceController::class,'destroy'])->name('admin.service-destroy');
        Route::post('service/toggle-status', [ServiceController::class, 'service_toggleStatus'])->name('admin.service-status');

        Route::get('service-category',[ServiceCategoryController::class,'index'])->name('admin.service-category');
        Route::post('service-category/store',[ServiceCategoryController::class,'store'])->name('admin.service-category-store');
        Route::get('service-category/{id}/edit',[ServiceCategoryController::class,'edit'])->name('admin.service-category-edit');
        Route::post('service-category/{id}/update',[ServiceCategoryController::class,'update'])->name('admin.service-category-update');
        Route::get('service-category/{id}/destroy',[ServiceCategoryController::class,'destroy'])->name('admin.service-category-destroy');
        Route::post('service-category/toggle-status', [ServiceCategoryController::class, 'serviceCategory_toggleStatus'])->name('admin.service-category-status');

        Route::get('service-subcategory',[ServiceSubCategoryController::class,'index'])->name('admin.service-subcategory');
        Route::post('service-subcategory/store',[ServiceSubCategoryController::class,'store'])->name('admin.service-subcategory-store');
        Route::get('service-subcategory/{id}/edit',[ServiceSubCategoryController::class,'edit'])->name('admin.service-subcategory-edit');
        Route::post('service-subcategory/{id}/update',[ServiceSubCategoryController::class,'update'])->name('admin.service-subcategory-update');
        Route::get('service-subcategory/{id}/destroy',[ServiceSubCategoryController::class,'destroy'])->name('admin.service-subcategory-destroy');
        Route::post('service-subcategory/toggle-status', [ServiceSubCategoryController::class, 'serviceSubCategory_toggleStatus'])->name('admin.service-subcategory-status');

        Route::get('service/faq',[ServiceFaqController::class,'index'])->name('admin.service-faq');
        Route::get('service-faq/create',[ServiceFaqController::class,'create'])->name('admin.service-faq-create');
        Route::post('service-faq/store',[ServiceFaqController::class,'store'])->name('admin.service-faq-store');
        Route::get('service-faq/{id}/edit',[ServiceFaqController::class,'edit'])->name('admin.service-faq-edit');
        Route::post('service-faq/{id}/update',[ServiceFaqController::class,'update'])->name('admin.service-faq-update');
        Route::get('service-faq/{id}/destroy',[ServiceFaqController::class,'destroy'])->name('admin.service-faq-destroy');
        Route::post('service-faq/toggle-status', [ServiceFaqController::class, 'serviceFaq_toggleStatus'])->name('admin.service-faq-status');

        Route::get('service/benefits',[ServiceBenefitController::class,'index'])->name('admin.service-benefits');
        Route::get('service-benefits/create',[ServiceBenefitController::class,'create'])->name('admin.service-benefits-create');
        Route::post('service-benefits/store',[ServiceBenefitController::class,'store'])->name('admin.service-benefits-store');
        Route::get('service-benefits/{id}/edit',[ServiceBenefitController::class,'edit'])->name('admin.service-benefits-edit');
        Route::post('service-benefits/{id}/update',[ServiceBenefitController::class,'update'])->name('admin.service-benefits-update');
        Route::get('service-benefits/{id}/destroy',[ServiceBenefitController::class,'destroy'])->name('admin.service-benefits-destroy');
        Route::post('service-benefits/toggle-status', [ServiceBenefitController::class, 'serviceBenefits_toggleStatus'])->name('admin.service-benefits-status');

        Route::get('service/features',[ServiceFeatureController::class,'index'])->name('admin.service-features');
        Route::get('service-features/create',[ServiceFeatureController::class,'create'])->name('admin.service-features-create');
        Route::post('service-features/store',[ServiceFeatureController::class,'store'])->name('admin.service-features-store');
        Route::get('service-features/{id}/edit',[ServiceFeatureController::class,'edit'])->name('admin.service-features-edit');
        Route::post('service-features/{id}/update',[ServiceFeatureController::class,'update'])->name('admin.service-features-update');
        Route::get('service-features/{id}/destroy',[ServiceFeatureController::class,'destroy'])->name('admin.service-features-destroy');
        Route::post('service-features/toggle-status', [ServiceFeatureController::class, 'serviceFeatures_toggleStatus'])->name('admin.service-features-status');

        Route::get('service/essentials',[ServiceEssentialController::class,'index'])->name('admin.service-essentials');
        Route::get('service-essentials/create',[ServiceEssentialController::class,'create'])->name('admin.service-essentials-create');
        Route::post('service-essentials/store',[ServiceEssentialController::class,'store'])->name('admin.service-essentials-store');
        Route::get('service-essentials/{id}/edit',[ServiceEssentialController::class,'edit'])->name('admin.service-essentials-edit');
        Route::post('service-essentials/{id}/update',[ServiceEssentialController::class,'update'])->name('admin.service-essentials-update');
        Route::get('service-essentials/{id}/destroy',[ServiceEssentialController::class,'destroy'])->name('admin.service-essentials-destroy');
        Route::post('service-essentials/toggle-status', [ServiceEssentialController::class, 'serviceEssentials_toggleStatus'])->name('admin.service-essentials-status');

        // Admin About
        Route::get('about', [AboutController::class, 'index'])->name('admin.about');
        Route::post('about/store', [AboutController::class, 'store'])->name('admin.about-store');
        Route::post('about/{id}/update', [AboutController::class, 'update'])->name('admin.about-update');
        Route::get('about/{id}/destroy', [AboutController::class, 'destroy'])->name('admin.about-destroy');
        Route::post('about/toggle-status', [AboutController::class, 'toggleStatus'])->name('admin.about-status');

        // Admin Blog / Projects
        Route::get('projects',[BlogController::class,'index'])->name('admin.blog');
        Route::get('projects/create',[BlogController::class,'create'])->name('admin.blog-create');
        Route::post('projects/store',[BlogController::class,'store'])->name('admin.blog-store');
        Route::get('projects/{id}/edit',[BlogController::class,'edit'])->name('admin.blog-edit');
        Route::post('projects/{id}/update',[BlogController::class,'update'])->name('admin.blog-update');
        Route::post('projects/gallery-images', [BlogController::class, 'uploadGalleryImage'])->name('admin.blog.upload-gallery');
        Route::get('projects/gallery-images/{id}/destroy', [BlogController::class, 'destroyGalleryImage'])->name('admin.blog.destroy-gallery');
        Route::get('projects/{id}/destroy',[BlogController::class,'destroy'])->name('admin.blog-destroy');
        Route::post('projects/toggle-status', [BlogController::class, 'blog_toggleStatus'])->name('admin.blog-status');

        Route::get('projects-category',[BlogCategoryController::class,'index'])->name('admin.blog-category');
        Route::post('projects-category/store',[BlogCategoryController::class,'store'])->name('admin.blog-category-store');
        Route::get('projects-category/{id}/edit',[BlogCategoryController::class,'edit'])->name('admin.blog-category-edit');
        Route::post('projects-category/{id}/update',[BlogCategoryController::class,'update'])->name('admin.blog-category-update');
        Route::get('projects-category/{id}/destroy',[BlogCategoryController::class,'destroy'])->name('admin.blog-category-destroy');
        Route::post('projects-category/toggle-status', [BlogCategoryController::class, 'blogCategory_toggleStatus'])->name('admin.blog-category-status');

        // Admin Brands
        Route::get('brands',[BrandController::class,'index'])->name('admin.brands');
        Route::post('brands/store',[BrandController::class,'store'])->name('admin.brands-store');
        Route::get('brands/{id}/edit',[BrandController::class,'edit'])->name('admin.brands-edit');
        Route::post('brands/{id}/update',[BrandController::class,'update'])->name('admin.brands-update');
        Route::get('brands/{id}/destroy',[BrandController::class,'destroy'])->name('admin.brands-destroy');
        Route::post('brands/toggle-status', [BrandController::class, 'brands_toggleStatus'])->name('admin.brands-status');

        // Admin Testimonial
        Route::get('testimonial',[TestimonialController::class,'index'])->name('admin.testimonial');
        Route::get('testimonial/create',[TestimonialController::class,'create'])->name('admin.testimonial-create');
        Route::get('testimonial/{id}/edit',[TestimonialController::class,'edit'])->name('admin.testimonial-edit');
        Route::post('testimonial/store',[TestimonialController::class,'store'])->name('admin.testimonial-store');
        Route::post('testimonial/{id}/update',[TestimonialController::class,'update'])->name('admin.testimonial-update');
        Route::get('testimonial/{id}/destroy',[TestimonialController::class,'destroy'])->name('admin.testimonial-destroy');
        Route::post('testimonial/toggle-status', [TestimonialController::class, 'testimonial_toggleStatus'])->name('admin.testimonial-status');

        // Admin Team Members
        Route::get('team_members',[TeamMemberController::class,'index'])->name('admin.team_members');
        Route::get('team_members/create',[TeamMemberController::class,'create'])->name('admin.team_members-create');
        Route::get('team_members/{id}/edit',[TeamMemberController::class,'edit'])->name('admin.team_members-edit');
        Route::post('team_members/store',[TeamMemberController::class,'store'])->name('admin.team_members-store');
        Route::post('team_members/{id}/update',[TeamMemberController::class,'update'])->name('admin.team_members-update');
        Route::get('team_members/{id}/destroy',[TeamMemberController::class,'destroy'])->name('admin.team_members-destroy');
        Route::post('team_members/toggle-status', [TeamMemberController::class, 'teammembers_toggleStatus'])->name('admin.team_members-status');

        // Admin Industry
        Route::get('industry',[IndustryController::class,'index'])->name('admin.industry');
        Route::get('industry/create',[IndustryController::class,'create'])->name('admin.industry-create');
        Route::get('industry/{id}/edit',[IndustryController::class,'edit'])->name('admin.industry-edit');
        Route::post('industry/store',[IndustryController::class,'store'])->name('admin.industry-store');
        Route::post('industry/{id}/update',[IndustryController::class,'update'])->name('admin.industry-update');
        Route::get('industry/{id}/destroy',[IndustryController::class,'destroy'])->name('admin.industry-destroy');
        Route::post('industry/toggle-status', [IndustryController::class, 'Industry_toggleStatus'])->name('admin.industry-status');

        Route::get('industry/service',[IndustryServiceController::class,'index'])->name('admin.industry-service');
        Route::get('industry-service/create',[IndustryServiceController::class,'create'])->name('admin.industry-service-create');
        Route::post('industry-service/store',[IndustryServiceController::class,'store'])->name('admin.industry-service-store');
        Route::get('industry-service/{id}/edit',[IndustryServiceController::class,'edit'])->name('admin.industry-service-edit');
        Route::post('industry-service/{id}/update',[IndustryServiceController::class,'update'])->name('admin.industry-service-update');
        Route::get('industry-service/{id}/destroy',[IndustryServiceController::class,'destroy'])->name('admin.industry-service-destroy');
        Route::post('industry-service/toggle-status', [IndustryServiceController::class, 'industryService_toggleStatus'])->name('admin.industry-service-status');

        Route::get('industry/faq',[IndustryFaqController::class,'index'])->name('admin.industry-faq');
        Route::get('industry-faq/create',[IndustryFaqController::class,'create'])->name('admin.industry-faq-create');
        Route::post('industry-faq/store',[IndustryFaqController::class,'store'])->name('admin.industry-faq-store');
        Route::get('industry-faq/{id}/edit',[IndustryFaqController::class,'edit'])->name('admin.industry-faq-edit');
        Route::post('industry-faq/{id}/update',[IndustryFaqController::class,'update'])->name('admin.industry-faq-update');
        Route::get('industry-faq/{id}/destroy',[IndustryFaqController::class,'destroy'])->name('admin.industry-faq-destroy');
        Route::post('industry-faq/toggle-status', [IndustryFaqController::class, 'industryFaq_toggleStatus'])->name('admin.industry-faq-status');

        Route::get('industry/features',[IndustryFeatureController::class,'index'])->name('admin.industry-features');
        Route::get('industry-features/create',[IndustryFeatureController::class,'create'])->name('admin.industry-features-create');
        Route::post('industry-features/store',[IndustryFeatureController::class,'store'])->name('admin.industry-features-store');
        Route::get('industry-features/{id}/edit',[IndustryFeatureController::class,'edit'])->name('admin.industry-features-edit');
        Route::post('industry-features/{id}/update',[IndustryFeatureController::class,'update'])->name('admin.industry-features-update');
        Route::get('industry-features/{id}/destroy',[IndustryFeatureController::class,'destroy'])->name('admin.industry-features-destroy');
        Route::post('industry-features/toggle-status', [IndustryFeatureController::class, 'industryFeatures_toggleStatus'])->name('admin.industry-features-status');

        // Admin FAQs
        Route::get('faqs', [FaqController::class, 'index'])->name('admin.faqs');
        Route::post('faqs/store', [FaqController::class, 'store'])->name('admin.faqs-store');
        Route::get('faqs/{id}/edit', [FaqController::class, 'edit'])->name('admin.faqs-edit');
        Route::post('faqs/{id}/update', [FaqController::class, 'update'])->name('admin.faqs-update');
        Route::get('faqs/{id}/destroy', [FaqController::class, 'destroy'])->name('admin.faqs-destroy');
        Route::post('faqs/toggle-status', [FaqController::class, 'toggleStatus'])->name('admin.faqs-status');

        // Admin Gallery
        Route::get('galleries', [GalleryController::class, 'index'])->name('admin.galleries');
        Route::post('galleries/store', [GalleryController::class, 'store'])->name('admin.galleries-store');
        Route::get('galleries/{id}/edit', [GalleryController::class, 'edit'])->name('admin.galleries-edit');
        Route::post('galleries/{id}/update', [GalleryController::class, 'update'])->name('admin.galleries-update');
        Route::get('galleries/{id}/destroy', [GalleryController::class, 'destroy'])->name('admin.galleries-destroy');
        Route::post('galleries/toggle-status', [GalleryController::class, 'toggleStatus'])->name('admin.galleries-status');

        // Admin Icon
        Route::post('/icons/add', [IconController::class, 'add'])->name('icons.add');
    });
});
