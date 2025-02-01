import { Container, Row, Col } from 'react-bootstrap';
import Logo from './assets/Logo';
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

  return (
    <>
      <Global
        styles={css`
          footer#web-footer {
            background-color: #2d2d2d;
            color: white;
            padding: 20px 0;
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
                    src={Logo}
                    alt='Logo'
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
              <h5 style={{ color: 'red' }}>Contact Info</h5>
              <p>
                <Link to='/contact-us#map'>
                  <i className='fa-solid fa-location-dot' />{' '}
                  {
                    cimsa.profile.find((item) => item.column == 'alamat')
                      .text_content
                  }
                </Link>
              </p>
              <p>
                <i className='fa-solid fa-phone' />{' '}
                {
                  cimsa.profile.find((item) => item.column == 'nomor-telepon')
                    .text_content
                }
              </p>
              <p>
                <Link to='/contact-us'>
                  <i className='fa-solid fa-envelope' />{' '}
                  {
                    cimsa.profile.find((item) => item.column == 'email')
                      .text_content
                  }
                </Link>
              </p>
            </Col>
            <Col md={2}>
              <h5 style={{ color: 'red' }}>Follow Us</h5>
              <SocmedLink
                title='Instagram'
                iconClass='fa-brands fa-instagram'
                url={
                  cimsa.socmeds.find((item) => item.platform == 'instagram').url
                }
              />
              <SocmedLink
                title='YouTube'
                iconClass='fa-brands fa-youtube'
                url={
                  cimsa.socmeds.find((item) => item.platform == 'youtube').url
                }
              />
              <SocmedLink
                title='Facebook'
                iconClass='fa-brands fa-facebook'
                url={
                  cimsa.socmeds.find((item) => item.platform == 'facebook').url
                }
              />
              <SocmedLink
                title='X'
                iconClass='fa-brands fa-x-twitter'
                url={
                  cimsa.socmeds.find((item) => item.platform == 'twitter').url
                }
              />
            </Col>
            <Col md={2}>
              <h5 style={{ color: 'red' }}>Quick Links</h5>
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
