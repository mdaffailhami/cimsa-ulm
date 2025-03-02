import { css } from '@emotion/react';
import { Col, Container, Row } from 'react-bootstrap';
import { useContext } from 'react';
import LoadingPage from './LoadingPage';
import { getOnHoverAnimationCss } from '../utils';
import { CimsaStateContext } from '../states/Cimsa';

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

            ${getOnHoverAnimationCss(1.175)}
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
  const cimsa = useContext(CimsaStateContext);

  const socmeds = {
    facebook: cimsa.socmeds.find((x) => x.platform == 'facebook'),
    instagram: cimsa.socmeds.find((x) => x.platform == 'instagram'),
    x: cimsa.socmeds.find((x) => x.platform == 'twitter'),
    threads: cimsa.socmeds.find((x) => x.platform == 'thread'),
    youtube: cimsa.socmeds.find((x) => x.platform == 'youtube'),
    tiktok: cimsa.socmeds.find((x) => x.platform == 'tiktok'),
  };

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
            return <LoadingPage animation='border' height='100px' />;
          } else {
            return (
              <Row className='justify-content-center' style={{ gap: '5px' }}>
                {socmeds.facebook && (
                  <SocmedButton
                    iconClass='fa-brands fa-facebook'
                    url={socmeds.facebook.url}
                  />
                )}
                {socmeds.instagram && (
                  <SocmedButton
                    iconClass='fa-brands fa-instagram'
                    url={socmeds.instagram.url}
                  />
                )}
                {socmeds.x && (
                  <SocmedButton
                    iconClass='fa-brands fa-x-twitter'
                    url={socmeds.x.url}
                  />
                )}
                {socmeds.threads && (
                  <SocmedButton
                    iconClass='fa-brands fa-threads'
                    url={socmeds.threads.url}
                  />
                )}
                {socmeds.youtube && (
                  <SocmedButton
                    iconClass='fa-brands fa-youtube'
                    url={socmeds.youtube.url}
                  />
                )}
                {socmeds.tiktok && (
                  <SocmedButton
                    iconClass='fa-brands fa-tiktok'
                    url={socmeds.tiktok.url}
                  />
                )}
              </Row>
            );
          }
        })()}
      </Container>
    </>
  );
}
