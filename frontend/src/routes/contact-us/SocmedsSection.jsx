import { css } from '@emotion/react';
import { Col, Container, Row } from 'react-bootstrap';
import OnHoverAnimationCss from '../OnHoverAnimationCss';

function SocmedButton({ iconClass, url }) {
  return (
    <Col xs={1} style={{ width: '78px' }}>
      <div data-aos='zoom-in' data-aos-duration='1200' data-aos-once='true'>
        <a
          href={url}
          target='_blank'
          css={css`
            display: block;
            margin-bottom: 8px;

            ${OnHoverAnimationCss(1.175)}
          `}
        >
          <span
            style={{
              background: 'red',
              borderRadius: '24%',
              padding: '10px 0 8px 0',
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
      </div>
    </Col>
  );
}
export default function SocmedsSection() {
  return (
    <>
      <h1
        data-aos='fade-right'
        data-aos-duration='1200'
        data-aos-once='true'
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
