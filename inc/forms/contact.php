<?php
// Page source
$permalink = get_permalink();
?>

<script>
    function onSubmit(token) {
        document.getElementById("form-contact").submit();
    }
</script>

<form action="https://forms.zohopublic.com/mobix/form/Nouscontacter/formperma/5OrA-Ro2-guzcR2em7nX-DgOBSAxerngRNGvPId9dVg/htmlRecords/submit"
      name="form-contact"
      id="form-contact"
      method="POST"
      accept-charset="UTF-8"
      enctype="multipart/form-data"
      class="form--black">

    <input type="hidden" name="zf_referrer_name" value="">
    <input type="hidden" name="zf_redirect_url" value="">
    <input type="hidden" name="zc_gad" value="">

    <label>
        Le nom de votre société
        <em>*</em>
    </label>
    <input type="text" name="SingleLine1" value="" fieldType=1 maxlength="255" placeholder="<?php _e('Le nom de votre société', 'themede'); ?>*"
           required="required"/>

    <!--Name-->
    <label> Nom complet
        <em>*</em>
    </label>
    <!--    <select name="Name_Salutation" fieldType=7>-->
    <!--        <option value="M.">M.</option>-->
    <!--        <option value="Mme.">Mme.</option>-->
    <!--    </select>-->
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
    <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" size="20" compname="PhoneNumber" name="PhoneNumber_countrycode"
           id="international_PhoneNumber_countrycode" placeholder="<?php _e('Téléphone', 'themede'); ?>*"
           required="required"/>
    <label>Number</label>
    <!--Multi Line-->
    <label> <?php _e('Message', 'themede'); ?>
        <em>*</em>
    </label>
    <textarea name="MultiLine" maxlength="65535" placeholder="<?php _e('Message*', 'themede'); ?>" required="required"></textarea>

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

    <input type="checkbox" id="DecisionBoxContact" name="DecisionBox" required/>
    <label for="DecisionBoxContact">
        <?php _e('En soumettant ce formulaire, j\'accepte que les informations saisies soient
        exploitées par Mobix dans le cadre de cette prise de contact et de la relation commerciale qui
        peut en découler.&nbsp;Pour connaitre et exercer vos droits notamment de modification et de rectification,
        veuillez consulter nos', 'themede'); ?>
         <a rel="noopener noreferrer" href="<?php echo get_privacy_policy_url(); ?>" target="_blank"><?php _e('conditions de gestion des données personnelles', 'themede'); ?></a>*
    </label>

	<button
            type="submit"
            class="button button--orange g-recaptcha"
            data-callback='onSubmit'
            data-action='submit'><?php _e('Envoyer', 'themede'); ?>
    </button>
</form>
