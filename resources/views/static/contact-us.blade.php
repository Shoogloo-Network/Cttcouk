@extends('layouts.app')
@section('title', 'About Us')
@section('meta-description', 'PO Ferries about us')
@section('meta-keyword', 'PO Ferries')
@section('content')
    <section class="section-gray fadeInUp animated">
        <div class="container herobanner">
            <h1 class="heading mb-4">Contact Us</h1>
            <div class="row">
                <div class="col-md-4 col-sm-12 plr-0">
                    <div class="column-inner">
                        <div class="column-wrapper">
                            <div class="featuredOffers offers">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6 fLeft">
                                            If you have a query relates to your bookings, then get in touch with us. please
                                            use the form below and we will come back to you within 10 days.<br><br>
                                            <div class="boxForListViewContent clearfix">
                                                <div class="boxList">
                                                    <div>
                                                        <form id="contactForm">
                                                            <table width="100%" border="0" cellspacing="0"
                                                                cellpadding="6">
                                                                <tr>
                                                                    <td width="15%" align="right"><b>Name:</b>*</td>
                                                                    <td width="85%"><input type="text"
                                                                            name="contactName" id="contactName"
                                                                            value="" class="input"
                                                                            style="width:100%; height:35px" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="15%" align="right"><b>Number:</b></td>
                                                                    <td width="85%"><input type="text"
                                                                            name="contactNumber" id="contactNumber"
                                                                            value="" class="input"
                                                                            style="width:100%; height:35px" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><b>Email:</b>*</td>
                                                                    <td><input type="text" name="contactEmail"
                                                                            id="contactEmail" value="" class="input"
                                                                            style="width:100%; height:35px" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><b>Subject:</b>*</td>
                                                                    <td><input type="text" name="contactSubject"
                                                                            id="contactSubject" value=""
                                                                            class="input"
                                                                            style="width:100%; height:35px" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><b>Message:</b>*</td>
                                                                    <td>
                                                                        <textarea name="contactMessage" id="contactMessage" rows="5" cols="" style="width:100%;" class="input"></textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td><input type="submit" value="Submit"
                                                                            id="submitQuery" class="contactus button btn"
                                                                            style="background:#4764A3;border:0 none;color:#fff; font-weight:bold; padding:5px 10px;" /><span
                                                                            style="padding-left:10px;font-weight:bold;"></span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div><!-- /newsList -->

                                            </div><!-- /boxForListView  -->
                                            <strong>ADDRESS:</strong> UNIT 461 – 463, 4th Floor, JMD Megapolis, Sector 48,
                                            Gurgaon, Haryana – 122001, India<br>
                                            <strong>Contact Email:</strong> <a
                                                href="mailto:cheaptraintickets@shoogloo.com">cheaptraintickets@shoogloo.com</a><br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
    </section>
@endsection
