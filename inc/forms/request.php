<?php
if (!isset($requestChoice)) {
    $requestChoice = '';
}

if (!isset($demoSelectedChoice)) {
    $demoSelectedChoice = '';
}

// Page source
$permalink = get_permalink();
?>

<script>
    function onSubmit(token) {
        document.getElementById("form-request").submit();
    }
</script>

<form action='https://forms.zohopublic.com/mobix/form/Demandecommercialedmoformation/formperma/AECVqHtfu00TkGkaCU_64QbAQe0FcNYHHxDKMXdymWw/htmlRecords/submit'
      name='form-request' id="form-request"
      class="<?php if (get_page_template_slug() !== 'template-products.php'): echo 'no-description'; endif; ?> form--black"
      method='POST'
      accept-charset='UTF-8'
      enctype='multipart/form-data'>

    <?php if (get_page_template_slug() === 'template-products.php'): ?>
        <p class="form-description">
            <?php _e("Faites-vous accompagner pour mettre en place les meilleures solutions pour votre entreprise", 'themede'); ?>
        </p>
    <?php endif; ?>

    <input type="hidden" name="zf_referrer_name" value="">
    <input type="hidden" name="zf_redirect_url" value="">
    <input type="hidden" name="zc_gad" value="">

    <label>
        Votre demande
        <em>*</em>
    </label>
    <div class="select-container">
        <select name="Dropdown" autocomplete="off" required="required">
            <option selected="true" value=""><?php _e('Votre demande', 'themede'); ?></option>
            <option value="D&eacute;monstration" data-value="démo"
                    <?php if ($requestChoice === 'démo'): ?>selected="selected"<?php endif; ?>><?php _e('Démonstration', 'themede'); ?>
            </option>
            <option value="Commercial" data-value="commerciale"
                    <?php if ($requestChoice === 'commerciale'): ?>selected="selected"<?php endif; ?>><?php _e('Commerciale', 'themede'); ?>
            </option>
            <option value="Formation" data-value="formation"
                    <?php if ($requestChoice === 'formation'): ?>selected="selected"<?php endif; ?>><?php _e('Formation', 'themede'); ?>
            </option>
        </select>
    </div>

    <label>
        Le nom de votre société
        <em>*</em>
    </label>
    <input type="text" name="SingleLine1" value="" fieldType=1 maxlength="255" placeholder="<?php _e('Le nom de votre société', 'themede'); ?>*"/>
    <!--Name-->
    <label> Nom complet
        <em>*</em>
    </label>
<!--    <div class="select-container">-->
<!--        <select name="Name_Salutation" fieldType=7>-->
<!--            <option value="M.">M.</option>-->
<!--            <option value="Mme.">Mme.</option>-->
<!--        </select>-->
<!--    </div>-->
    <label>Titre</label>
    <input type="text" maxlength="255" name="Name_First" fieldType=7 placeholder="<?php _e('Prénom', 'themede'); ?>*" required="required"/>
    <label>Prénom</label>
    <input type="text" maxlength="255" name="Name_Last" fieldType=7 placeholder="<?php _e('Nom', 'themede'); ?>*" required="required"/>
    <label>Nom</label>
    <!--Email-->
    <label> E-mail
        <em>*</em>
    </label>
    <input type="email" maxlength="255" name="Email" value="" fieldType=9 placeholder="<?php _e('Email', 'themede'); ?>*" required="required"/>
    <!--Phone-->
    <label> Téléphone
        <em>*</em>
    </label>
<!--    <input type="text" compname="PhoneNumber_countrycodeval" name="PhoneNumber_countrycodeval" phoneFormat="1"-->
<!--           maxlength="10" id="international_PhoneNumber_countrycodeval" placeholder=""/>-->
<!--    <label>Code</label>-->
    <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" size="20" compname="PhoneNumber" name="PhoneNumber_countrycode" value="" id="international_PhoneNumber_countrycode" placeholder="<?php _e('Téléphone', 'themede'); ?>*" required="required"/>
    <label>Number</label>
    <!--Dropdown-->
    <label>
        Outil
        <em>*</em>
    </label>
    <div class="select-container tools">
        <select name="Dropdown1" autocomplete="off" required="required">
            <option value=""><?php _e("Sélectionner l'outil", 'themede'); ?></option>
            <option value="Zoho&#x20;One"
                    <?php if ($demoSelectedChoice === 'Zoho One'): ?>selected="selected"<?php endif; ?>>Zoho One
            </option>
            <option value="Zoho&#x20;CRM"
                    <?php if ($demoSelectedChoice === 'Zoho CRM'): ?>selected="selected"<?php endif; ?>>Zoho CRM
            </option>
            <option value="Zoho&#x20;Campaigns"
                    <?php if ($demoSelectedChoice === 'Zoho Campaigns'): ?>selected="selected"<?php endif; ?>>Zoho
                Campaigns
            </option>
            <option value="Zoho&#x20;Social"
                    <?php if ($demoSelectedChoice === 'Zoho Social'): ?>selected="selected"<?php endif; ?>>Zoho Social
            </option>
            <option value="Zoho&#x20;Survey"
                    <?php if ($demoSelectedChoice === 'Zoho Survey'): ?>selected="selected"<?php endif; ?>>Zoho Survey
            </option>
            <option value="Zoho&#x20;Forms"
                    <?php if ($demoSelectedChoice === 'Zoho Forms'): ?>selected="selected"<?php endif; ?>>Zoho Forms
            </option>
            <option value="Zoho&#x20;Desk"
                    <?php if ($demoSelectedChoice === 'Zoho Desk'): ?>selected="selected"<?php endif; ?>>Zoho Desk
            </option>
            <option value="Zoho&#x20;Sign"
                    <?php if ($demoSelectedChoice === 'Zoho Sign'): ?>selected="selected"<?php endif; ?>>Zoho Sign
            </option>
            <option value="Zoho&#x20;Sales&#x20;IQ"
                    <?php if ($demoSelectedChoice === 'Zoho sales IQ'): ?>selected="selected"<?php endif; ?>>Zoho Sales
                IQ
            </option>
            <option value="Zoho Projects"
                    <?php if ($demoSelectedChoice === 'Zoho Projects'): ?>selected="selected"<?php endif; ?>>Zoho Projects
            </option>
            <option value="Zoho&#x20;People"
                    <?php if ($demoSelectedChoice === 'Zoho People'): ?>selected="selected"<?php endif; ?>>Zoho
                People
            </option>
            <option value="Zoho&#x20;Recruit"
                    <?php if ($demoSelectedChoice === 'Zoho Recruit'): ?>selected="selected"<?php endif; ?>>Zoho
                Recruit
            </option>
            <option value="Zoho&#x20;Subscriptions"
                    <?php if ($demoSelectedChoice === 'Zoho Subscriptions'): ?>selected="selected"<?php endif; ?>>Zoho
                Subscriptions
            </option>
            <option value="Zoho&#x20;Analytics"
                    <?php if ($demoSelectedChoice === 'Zoho Analytics'): ?>selected="selected"<?php endif; ?>>Zoho
                Analytics
            </option>
            <option value="Zoho&#x20;PageSense"
                    <?php if ($demoSelectedChoice === 'Zoho PageSense'): ?>selected="selected"<?php endif; ?>>Zoho
                PageSense
            </option>
            <option value="Zoho&#x20;Books"
                    <?php if ($demoSelectedChoice === 'Zoho Books'): ?>selected="selected"<?php endif; ?>>Zoho Books
            </option>
            <option value="Zoho&#x20;Inventory"
                    <?php if ($demoSelectedChoice === 'Zoho Inventory'): ?>selected="selected"<?php endif; ?>>Zoho
                Inventory
            </option>
            <option value="Zoho&#x20;Creator"
                    <?php if ($demoSelectedChoice === 'Zoho Creator'): ?>selected="selected"<?php endif; ?>>Zoho
                Creator
            </option>
            <option value="Zoho&#x20;Vault"
                    <?php if ($demoSelectedChoice === 'Zoho Vault'): ?>selected="selected"<?php endif; ?>>Zoho Vault
            </option>
        </select>
    </div>

    <!--Single Line-->
    <label>
        Source
        <em>*</em>
    </label>
    <input  type="text" name="SingleLine" value="<?= $permalink ?>" fieldType=1 maxlength="255" placeholder="" />

    <label> <?php _e('Combien font 2+2 ?*', 'themede'); ?>
        <em>*</em>
    </label>
    <input type="text" name="Number" value="" maxlength="18" placeholder="<?php _e('Combien font 2+2 ?*', 'themede'); ?>" required="required" />

    <input type="checkbox" id="DecisionBox" name="DecisionBox" required/>
    <label for="DecisionBox">
        <?php _e('En soumettant ce formulaire, j\'accepte que les informations saisies soient exploitées par
        Mobix dans le cadre de cette prise de contact et de la relation commerciale qui peut en découler.&nbsp;Pour
        connaitre et exercer vos droits notamment de modification et de rectification, veuillez consulter nos ', 'themede'); ?>

        <a rel="noopener noreferrer" href="<?php echo get_privacy_policy_url(); ?>" target="_blank"><?php _e('conditions de gestion des données personnelles', 'themede'); ?></a>*
    </label>

    <button
            type="submit"
            class="button button--orange g-recaptcha"
            data-callback='onSubmit'
            data-action='submit'><?php _e('Envoyer', 'themede'); ?>
    </button>
</form>