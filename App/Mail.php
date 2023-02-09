<?php
class Mail
{
    public function resetPassword($usr_courriel) 
    {
        $mail = new Nette\Mail\Message;
        $mail->setFrom('contact@jaimemonvino.com')
            ->addTo(trim($usr_courriel))
            ->setSubject('Vino')
            ->setHtmlBody(
                "<p>Nous avons reçu votre demande de réinitialisation de mot de passe pour le compte:
                <a href='$usr_courriel'>$usr_courriel</a>
                </p>
                <p></p>
                <a href='https://jaimemonvino.com/'>
                - Modifier mon mot de passe
                </a>
            ");

        $mailer = new Nette\Mail\SmtpMailer(
            host: 'smtp.titan.email',
            username: 'contact@jaimemonvino.com',
            password: 'vino147',
            encryption: 'ssl',
        );
        $mailer->send($mail);
    }
}
