@extends('Mailtemplate')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 60rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center" >Privacy Policy</h5>
                        <div class="fs-1">It is the Catholic Mass policy to respect your privacy regarding any information we may collect while operating our website. 
                            Accordingly, we have developed this privacy policy in order for you to understand how we collect, use, communicate, disclose and otherwise make use of personal information. 
                            We have outlined our privacy policy below.
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><div class="fs-1">SECTION 1 - WHAT DO WE DO WITH YOUR INFORMATION?<br /><br />
                        When you purchase something from our site, as part of the buying and selling process, 
                        we collect the personal information you give us such as your name, address and email address.
                        When you browse our website, we also automatically receive your computer’s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system.</div></li>
                        <li class="list-group-item"><div class="fs-1">SECTION 2 - CONSENT<br /><br /> 
                        How do you get my consent?<br /><br />
                        When you provide us with personal information to complete a transaction, verify your credit card, 
                        place an order, complete an evaluation, we imply that you consent to our collecting it and using it for that specific reason only.</div></li>
                        <li class="list-group-item"><div class="fs-1">SECTION 3 - DISCLOSURE<br /><br /> 
                        We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.</div></li>
                        <li class="list-group-item"><div class="fs-1">SECTION 4 - THIRD-PARTY SERVICES<br /><br />
                        In general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us.<br /><br />
                        However, certain third-party service providers, such as payment gateways and other payment transaction processors, 
                        have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.<br /><br />
                        For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers.<br /><br />
                        In particular, remember that certain providers may be located in or have facilities that are located in a different jurisdiction than either you or us. 
                        So if you elect to proceed with a transaction that involves the services of a third-party service provider, 
                        then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located.<br /><br />
                        As an example, if you are located in Canada and your transaction is processed by a payment gateway located in the United States, 
                        then your personal information used in completing that transaction may be subject to disclosure under United States legislation, including the Patriot Act.<br /><br />
                        Once you leave our website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website’s Terms of Service.<br /><br />
                        Links<br /><br />
                        When you click on links on our site, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.</div></li>
                        <li class="list-group-item"><div class="fs-1">SECTION 5 - SECURITY<br /><br />
                        To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, 
                        misused, accessed, disclosed, altered or destroyed.</div></li>
                        <li class="list-group-item"><div class="fs-1">SECTION 6 - AGE OF CONSENT<br /><br />
                        By using this site, you represent that you are at least the age of majority in your state or province of residence, 
                        or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</div></li>
                        <li class="list-group-item"><div class="fs-1">SECTION 7 - CHANGES TO THIS PRIVACY POLICY<br /><br />
                        We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. 
                        If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.
                        If our site is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.</div></li>
                    </ul>
                    <div class="card-body">
                        <div class="fs-1">QUESTIONS AND CONTACT INFORMATION<br /><br />
                            If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, 
                            or simply want more information contact our Privacy Compliance Officer at <a href="{{ route('contact') }}" class="card-link">info@catholicmass.com</a>.
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection