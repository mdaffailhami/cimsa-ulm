import { Container, Row, Col } from 'react-bootstrap';
import { Global, css } from '@emotion/react';
import { Link } from 'react-router';
import { useContext } from 'react';
import LoadingPage from './components/LoadingPage';
import HtmlParser from './components/HtmlParser';
import { getOnHoverAnimationCss } from './utils';
import { CimsaStateContext } from './states/Cimsa';

function SocmedLink({ title, iconClass, url }) {
  return (
    <a
      href={url}
      target='_blank'
      style={{ display: 'block', marginBottom: '8px' }}
    >
      <i className={iconClass} /> {title}
    </a>
  );
}

function QuickLink({ title, url }) {
  return (
    <li>
      <Link to={url}>{title}</Link>
    </li>
  );
}

export default function Footer() {
  const cimsa = useContext(CimsaStateContext);

  const socmeds = {
    facebook: cimsa.socmeds.find((x) => x.platform == 'facebook'),
    instagram: cimsa.socmeds.find((x) => x.platform == 'instagram'),
    x: cimsa.socmeds.find((x) => x.platform == 'twitter'),
    threads: cimsa.socmeds.find((x) => x.platform == 'thread'),
    youtube: cimsa.socmeds.find((x) => x.platform == 'youtube'),
    tiktok: cimsa.socmeds.find((x) => x.platform == 'tiktok'),
  };

  console.log(socmeds);

  return (
    <>
      <Global
        styles={css`
          footer#web-footer {
            background-color: #2d2d2d;
            color: white;
            padding: 20px 0;
          }

          footer#web-footer h3 {
            color: red;
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
            font-size: 1.4rem;
          }

          footer a {
            color: white;
            text-decoration: none;
          }
          footer a:hover {
            text-decoration: underline;
          }
        `}
      />
      <footer id='web-footer'>
        <Container>
          <Row
            data-aos='fade-left'
            data-aos-duration='1200'
            data-aos-once='true'
          >
            <Col md={5}>
              <Link to='/'>
                <div
                  data-aos='zoom-in-right'
                  data-aos-once='true'
                  data-aos-duration='1200'
                >
                  <img
                    src={'/logo.png'}
                    alt='CIMSA ULM'
                    style={{
                      height: '50px',
                      marginBottom: '10px',
                    }}
                    css={getOnHoverAnimationCss(1.1)}
                  />
                </div>
              </Link>
              <p>
                <HtmlParser
                  html={
                    cimsa.profile.find((item) => item.column == 'deskripsi')
                      .long_text_content
                  }
                />
              </p>
            </Col>
            <Col md={3}>
              <h3 style={{ color: 'red' }}>Contact Info</h3>
              <div style={{ marginBottom: '9px' }}>
                <Link to='/contact-us#map'>
                  <i className='fa-solid fa-location-dot' />{' '}
                  {
                    cimsa.profile.find((item) => item.column == 'alamat')
                      .text_content
                  }
                </Link>
              </div>
              <div style={{ marginBottom: '9px' }}>
                <i className='fa-solid fa-phone' />{' '}
                {
                  cimsa.profile.find((item) => item.column == 'nomor-telepon')
                    .text_content
                }
              </div>
              <div>
                <Link to='/contact-us'>
                  <i className='fa-solid fa-envelope' />{' '}
                  {
                    cimsa.profile.find((item) => item.column == 'email')
                      .text_content
                  }
                </Link>
              </div>
            </Col>
            <Col md={2}>
              <h3 style={{ color: 'red' }}>Follow Us</h3>
              {socmeds.facebook && (
                <SocmedLink
                  title='Facebook'
                  iconClass='fa-brands fa-facebook'
                  url={socmeds.facebook.url}
                />
              )}
              {socmeds.instagram && (
                <SocmedLink
                  title='Instagram'
                  iconClass='fa-brands fa-instagram'
                  url={socmeds.instagram.url}
                />
              )}
              {socmeds.x && (
                <SocmedLink
                  title='X'
                  iconClass='fa-brands fa-x-twitter'
                  url={socmeds.x.url}
                />
              )}
              {socmeds.threads && (
                <SocmedLink
                  title='Threads'
                  iconClass='fa-brands fa-threads'
                  url={socmeds.threads.url}
                />
              )}
              {socmeds.youtube && (
                <SocmedLink
                  title='YouTube'
                  iconClass='fa-brands fa-youtube'
                  url={socmeds.youtube.url}
                />
              )}
              {socmeds.tiktok && (
                <SocmedLink
                  title='TikTok'
                  iconClass='fa-brands fa-tiktok'
                  url={socmeds.tiktok.url}
                />
              )}
            </Col>
            <Col md={2}>
              <h3 style={{ color: 'red' }}>Quick Links</h3>
              <ul style={{ paddingLeft: 0 }}>
                <QuickLink title='Home' url='/' />
                <QuickLink title='Blog' url='/blog' />
                <QuickLink title='About Us' url='/about-us' />
                <QuickLink title='The SCOs' url='/scos' />
                <QuickLink title='The Officials' url='/officials' />
              </ul>
            </Col>
          </Row>
          <hr />
          <Row>
            <Col md={12} style={{ textAlign: 'center' }}>
              <p>
                <i className='fa-regular fa-copyright' /> 2025 - CIMSA ULM
                <br />
                All rights reserved.
              </p>
            </Col>
          </Row>
        </Container>
      </footer>
    </>
  );
}
