<html>
  <head>   
    <base href="<?= site_url(); ?>"">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Kapital Academy</title>
    <style type="text/css">
      
      /* Default CSS */
      body,#body_style {margin: 0; padding: 0; background: #f1f1f1; color: #5b656e;}
      a {color: #09c;}
      a img {border: none; text-decoration: none;}
      table, table td {border-collapse: collapse;}
      td, h1, h2, h3, p {font-family: arial, helvetica, sans-serif; color: #313a42;}
      h1, h2, h3, h4 {color: #313a42 !important; font-weight: normal; line-height: 1.2;}
      h1 {font-size: 24px;}
      h2 {font-size: 18px;}
      h3 {font-size: 16px;}
      p {margin: 0 0 1.6em 0;}
      
      /* Force Outlook to provide a "view in browser" menu link. */
      #outlook a {padding:0;}
      
      /* Preheader and webversion */
      .preheader {background-color: #f6f6f6;}
      .preheaderContent, .webversion, .webversion a {color: #999999; font-size: 10px;}
      .preheaderContent{width: 440px;}
      .preheaderContent, .webversion {padding: 5px 10px;}
      .webversion {width: 200px; text-align: right;}
      .webversion a {text-decoration: underline; color: #999999; font-size: 10px;}
      
      /* Logo (branding) */
      .logoContainer {padding: 20px 0 10px 0px; width: 320px;}
      .logoContainer a {color: #ffffff;}
      
      /* Whitespace (imageless spacer) */
      .whitespace {font-family: 0px; line-height: 0px;}
      
      /* Button */
      .buttonContainer {padding: 10px 20px 10px 20px;}
      .button {padding: 10px 5px 10px 5px; text-align: center; background-color: #ff6b6b; border-radius: 4px;}
      .button a {color: #ffffff; text-decoration: none; display: block; text-transform: uppercase;}
      
      /* Featured content */
      .featuredHeader {background: #556270;}
      #featuredImage img {display: block; margin: 0 auto;}
      .featuredTitle {color: #ffffff; font-size: 26px; padding: 0px 0px 10px 0px; font-weight: bold;}
      .featuredContent {color: #ffffff;}
      
      /* One horizontal section of content: e.g. */
      .section {padding: 20px 0px 0px 0px;}
      .sectionOdd {background-color: #f1f1f1;}
      .sectionEven {background-color: #ffffff;}
      .sectionOdd, .sectionEven {padding: 30px 0px 30px 0px;}
      
      /* An article */
      .sectionArticleTitle, .sectionArticleContent {text-align: center;}
      .sectionArticleTitle {font-size: 18px; padding: 10px 0px 5px; 0px;}
      .sectionArticleContent {font-size: 13px; line-height: 18px;}
      .sectionArticleImage {text-align: center;}
      .sectionArticleImage img {padding: 0px 0px 0px 0px; -ms-interpolation-mode: bicubic;}
      
      
      .sectionTitle, .sectionSubTitle{text-align: center;}
      .sectionTitle {font-size: 26px; padding: 0px 10px 10px 10px}
      .sectionSubTitle {padding: 0px 10px 20px 10px;}
      
      /* Footer and social media */
      .footNotes {padding: 0px 20px 0px 20px;}
      .footNotes a {color: #556270; font-size: 13px;}
      .socialMedia {background: #556270;}
      
      
      /* CSS for specific screen width(s) */
      @media only screen and (max-width: 480px) {
        body,table,td,p,a,li,blockquote {-webkit-text-size-adjust:none !important;}
          body[yahoofix] table {width: 100% !important;}
          body[yahoofix] .webversion {display: none; font-size: 0; max-height: 0; line-height: 0; mso-hide: all;}
          body[yahoofix] .logoContainer, body[yahoofix] .featuredTitle , body[yahoofix] .featuredContent {text-align: center;}
          body[yahoofix] .sectionArticleImage img {height: auto !important; max-width: 100% !important;}
          body[yahoofix] .preheaderContent{text-align: center;}
          body[yahoofix] .buttonContainer {padding: 0px 20px 0px 20px;}
          body[yahoofix] .column {float: left; width: 100%;}
          body[yahoofix] #featuredImage {text-align: center;}
          body[yahoofix] .featuredTitle {line-height: 24px; font-weight: normal !important; padding: 0px 10px 25px 10px;}
          body[yahoofix] .featuredContent {padding: 0px 10px 20px 10px;}
          body[yahoofix] .sectionArticleTitle {padding: 0px 10px 0px 10px !important;}
          body[yahoofix] .sectionArticleContent {padding: 0px 10px 30px 10px !important;}
        }
    </style>
  </head>
  <body yahoofix>
    <span id="body_style" style="display:block">
      
      <!-- Preheader -->
      <table class="preheader" cellpadding="0" cellspacing="0" width="100%" style="display: none">
        <tr>
          <td>
            <!-- preheaderContent and webversion -->
            <table border="0" cellpadding="0" cellspacing="0" summary="" width="640" align="center">
              <tr>
                <td class="preheaderContent">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td class="webversion">No images? <a href="#" title="View the webversion">View the webversion</a></td>
              </tr>
            </table>
            <!-- End preheaderContent and webversion -->
          </td>
        </tr>
      </table>
      <!-- End preheader -->
      
      <!-- topHeader -->
      <table border="0" cellspacing="0" cellpadding="0" width="100%" summary="" class="topHeader">
        <tr>
          <td>
            <!-- Logo (branding) -->
            <table border="0" cellspacing="0" cellpadding="0" width="640" align="center" summary="">
              <tr>
                <td class="logoContainer" align="center">
                  <a href="#" title="Lorem logo">
                    <img class="logo" src="assets/img/idoc_s_logo.png" alt="Kapital Academy" />
                  </a>
                </td>
              </tr>
            </table>
            <!-- End Logo (branding) -->
          </td>
        </tr>
      </table>
      <!-- End topHeader -->
      
      <!-- featuredHeader -->
      <table border="0" cellspacing="0" cellpadding="0" width="100%" summary="" class="featuredHeader">
        <tr>
          <td class="section">
            <table border="0" cellspacing="0" cellpadding="0" width="640" align="center" summary="">
              <tr>
                <td class="column">
                  <table border="0" cellspacing="0" cellpadding="0" width="395" summary="">
                    <tr>
                      <td class="featuredTitle">
                        Lorem ipsum dolor sit amet.
                      </td>
                    </tr>
                    <tr>
                      <td class="featuredContent">
                        Vivamus convallis rutrum convallis. Maecenas at libero malesuada, ultrices tortor fringilla, fringilla sapien.
                      </td>
                    </tr>
                  </table>
                </td>
                <td id="featuredImage" class="column"><img src="mobile-phone.png" width="234" alt="" /></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <!-- End featuredHeader -->
      
      <!-- Section -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" summary="">
        <tr>
          <td class="sectionOdd">
            <table border="0" cellpadding="0" cellspacing="0" width="640" align="center" summary="">
              <tr>
                <td class="column" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="200" align="left" summary="">
                    <tr>
                      <td class="sectionArticleImage">
                        <img src="article-image-23.png" width="150" alt="" />
                      </td>
                    </tr>
                    <tr><td class="sectionArticleTitle">Lorem</td></tr>
                    <tr><td class="sectionArticleContent">Interdum et malesuada fames ac ante ipsum primis in faucibus.<br /> <a href="#" title="Lorem">Lorem</a></td></tr>
                  </table>
                </td>
                <td class="column" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="200" align="center" summary="">
                    <tr>
                      <td class="sectionArticleImage">
                        <img src="article-image-24.png" width="150" alt="" />
                      </td>
                    </tr>
                    <tr><td class="sectionArticleTitle">Ipsum</td></tr>
                    <tr><td class="sectionArticleContent">Nullam elementum est leo, eleifend dignissim justo dapibus id.<br /> <a href="#" title="Lorem">Lorem</a></td></tr>
                  </table>
                </td>
                <td class="column" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" width="200" align="center" summary="">
                    <tr>
                      <td class="sectionArticleImage">
                        <img src="article-image-25.png" width="150" alt="" />
                      </td>
                    </tr>
                    <tr><td class="sectionArticleTitle">Dolor</td></tr>
                    <tr><td class="sectionArticleContent">Mauris placerat orci sed sem hendrerit, quis dictum mi ultricies.<br /> <a href="#" title="Lorem">Lorem</a></td></tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <table border="0" cellpadding="0" cellspacing="0" width="100%" summary="">
        <tr>
          <td class="sectionEven">
            <table border="0" cellpadding="0" cellspacing="0" width="640" align="center" summary="">
              <tr><td class="sectionTitle">Lorem ipsum?</td></tr>
              <tr><td class="sectionSubTitle">Mauris suscipit arcu vehicula quam tempus bibendum.</td></tr>
              <tr>
                <td class="buttonContainer">
                  <table border="0" cellpadding="0" cellspacing="0" summary="" width="30%" align="center">
                    <tr><td class="button"><a href="#" title="ipsum">ipsum</a></td></tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>

      <!-- End Section -->
      
      <!-- Social media -->
      <table border="0" cellspacing="0" cellpadding="0" width="100%" summary="" class="socialMedia">
        <tr><td class="whitespace" height="20">&nbsp;</td></tr>
        <tr>
          <td>
            <table border="0" cellspacing="0" cellpadding="0" width="120" align="center" summary="">
              <tr>
                <td align="center" width="32">
                  <a href="https://www.twitter.com" title="Twitter"><img src="twitt.png" width="29" alt="Twitter" /></a>
                </td>
                <td align="center" width="32">
                  <a href="https://www.facebook.com" title="Facebook"><img src="faceb.png" width="29" alt="Facebook" /></a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr><td class="whitespace" height="10">&nbsp;</td></tr>
      </table>
      <!-- End Social media -->
      
      <!-- Footer -->
      <table border="0" cellspacing="0" cellpadding="0" width="100%" summary="" class="footer">
        <tr><td class="whitespace" height="10">&nbsp;</td></tr>
        <tr>
          <td>
            <table border="0" cellspacing="0" cellpadding="0" width="120" align="center" summary="">
              <tr>
                <td class="footNotes" align="center">
                  <a href="#" title="Unsubscribe">Unsubscribe</a>
                </td>
                <td class="footNotes" align="center">
                  <a href="#" title="Lorem">Lorem</a>
                </td>
                <td class="footNotes" align="center">
                  <a href="#" title="Dolor">Dolor</a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr><td class="whitespace" height="10">&nbsp;</td></tr>
      </table>
      <!-- End Footer -->
    </span>
  </body>
</html>