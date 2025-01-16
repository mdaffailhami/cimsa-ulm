import { css } from '@emotion/react';
import { Col, Container, Row } from 'react-bootstrap';
import OnHoverAnimationCss from './OnHoverAnimationCss';
import { useContext } from 'react';
import { CimsaContext } from '../main';
import LoadingIndicator from './LoadingIndicator';

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
  const { socmeds } = useContext(CimsaContext);

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
        {(() => {
          if (!socmeds) {
            return <LoadingIndicator animation='border' height='100px' />;
          } else {
            return (
              <Row className='justify-content-center' style={{ gap: '5px' }}>
                <SocmedButton
                  iconClass='fa-brands fa-instagram'
                  url={socmeds.find((item) => item.platform == 'instagram').url}
                />
                <SocmedButton
                  iconClass='fa-brands fa-youtube'
                  url={socmeds.find((item) => item.platform == 'youtube').url}
                />
                <SocmedButton
                  iconClass='fa-brands fa-facebook'
                  url={socmeds.find((item) => item.platform == 'facebook').url}
                />
                <SocmedButton
                  iconClass='fa-brands fa-x-twitter'
                  url={socmeds.find((item) => item.platform == 'twitter').url}
                />
              </Row>
            );
          }
        })()}
      </Container>
    </>
  );
}
