import { css } from '@emotion/react';
import { Container } from 'react-bootstrap';

export default function MapSection() {
  return (
    <Container id='map'>
      <h1
        data-aos='fade-right'
        data-aos-duration='1200'
        data-aos-once='true'
        css={css`
          text-align: center;

          font-size: 33px;

          @media (min-width: 768px) {
            font-size: 39px;
          }
        `}
      >
        Come visit us..
      </h1>
      <center>
        <div
          css={css`
            @media (max-width: 575.99px) {
              padding: 0 10px;
            }
          `}
        >
          <iframe
            src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.211029688729!2d114.58294921060936!3d-3.2978638966631637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de4230963790c57%3A0x902859712cc02755!2sLambung%20Mangkurat%20University%20-%20Campus%20I%20Banjarmasin!5e0!3m2!1sen!2sid!4v1734245455540!5m2!1sen!2sid'
            allowFullScreen=''
            loading='lazy'
            referrerPolicy='no-referrer-when-downgrade'
            data-aos='fade-left'
            data-aos-duration='1200'
            data-aos-once='true'
            onError={(e) => {
              const errorMessage = document.createElement('p');
              errorMessage.style.color = 'red';
              errorMessage.style.fontWeight = 'bold';
              errorMessage.textContent = 'Error loading map';
              e.target.parentElement.insertBefore(errorMessage, e.target);
              console.error('Error loading map', e);
            }}
            css={css`
              border: none;
              width: 100%;
              height: 400px;

              @media (min-width: 992px) {
                padding-left: 200px;
                padding-right: 200px;
              }
            `}
          />
        </div>
      </center>
    </Container>
  );
}
