import { css } from '@emotion/react';
import { Container } from 'react-bootstrap';

export default function MapSection({ mapUrl }) {
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
            src={mapUrl}
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
