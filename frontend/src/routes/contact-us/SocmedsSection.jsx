import { css } from '@emotion/react';
import { Col, Container, Row } from 'react-bootstrap';

function SocmedButton({ iconClass, url }) {
  return (
    <Col xs={1} style={{ width: 'fit-content' }}>
      <a
        href={url}
        target='_blank'
        style={{ display: 'block', marginBottom: '8px' }}
      >
        <span
          style={{
            background: 'red',
            borderRadius: '24%',
            padding: '10px 10px 8px 10px',
            display: 'flex',
            justifyContent: 'center',
            alignItems: 'center',
          }}
        >
          <i
            className={iconClass}
            style={{
              color: 'white',
              fontWeight: 'bold',
              fontSize: '36px',
            }}
          />
        </span>
      </a>
    </Col>
  );
}
export default function SocmedsSection() {
  return (
    <>
      <h1
        data-aos='fade-down'
        css={css`
          padding-bottom: 10px;
          text-align: center;

          font-size: 33px;

          @media (min-width: 768px) {
            font-size: 39px;
          }
        `}
      >
        Follow us on our social medias!
      </h1>
      <Container
        css={css`
          padding-left: 13px;
          padding-right: 13px;

          @media (min-width: 992px) {
            padding-left: 10%;
            padding-right: 10%;
          }
        `}
      >
        <Row className='justify-content-center' style={{ gap: '5px' }}>
          <SocmedButton
            iconClass='fa-brands fa-facebook'
            url='https://www.instagram.com/lambungmangkurat/'
          />
          <SocmedButton
            iconClass='fa-brands fa-instagram'
            url='https://www.instagram.com/lambungmangkurat/'
          />
          <SocmedButton
            iconClass='fa-brands fa-linkedin'
            url='https://www.instagram.com/lambungmangkurat/'
          />
          <SocmedButton
            iconClass='fa-brands fa-spotify'
            url='https://www.instagram.com/lambungmangkurat/'
          />
          <SocmedButton
            iconClass='fa-brands fa-x-twitter'
            url='https://www.instagram.com/lambungmangkurat/'
          />
          <SocmedButton
            iconClass='fa-brands fa-github'
            url='https://www.instagram.com/lambungmangkurat/'
          />
          <SocmedButton
            iconClass='fa-brands fa-whatsapp'
            url='https://www.instagram.com/lambungmangkurat/'
          />
          <SocmedButton
            iconClass='fa-brands fa-youtube'
            url='https://www.instagram.com/lambungmangkurat/'
          />
        </Row>
      </Container>
    </>
  );
}
