import { css } from '@emotion/react';
import { Col, Container, Image, Row } from 'react-bootstrap';
import PrimaryButton from '../../components/PrimaryButton';
import { getOnHoverAnimationCss } from '../../utils';
import IFMSALogo from '../../assets/ifmsa-logo.jpg';

export default function IFMSASection({ description }) {
  return (
    <Container
      css={css`
        color: #1f3868;
        text-align: center;
        @media (min-width: 992px) {
          width: 720px;
        }
      `}
    >
      <br />
      <br />
      <h2 data-aos='fade-right' data-aos-duration='1200' data-aos-once='true'>
        <b>We are internationally affiliated.</b>
      </h2>
      <p
        data-aos='fade-left'
        data-aos-duration='1200'
        data-aos-once='true'
        style={{ fontSize: '20px' }}
      >
        CIMSA is Indonesia's national member organization (NMO) for the IFMSA,
        the international representative organization of medical students,
        recognized by the WHO.
      </p>
      <br />
      <Container
        data-aos='flip-left'
        data-aos-duration='1200'
        data-aos-once='true'
      >
        <Row
          xs={1}
          sm={1}
          md={2}
          className='g-3'
          css={css`
            align-items: center;
            padding: 0 0 15.5px 0;
            border-radius: 30px;
            box-shadow: 1px 1px 8px 4px rgba(0, 0, 0, 0.4);

            ${getOnHoverAnimationCss(1.03)}
          `}
        >
          <Col>
            <Image
              fluid
              alt='IFMSA'
              src={IFMSALogo}
              css={css`
                border-radius: 30px;
              `}
            />
          </Col>
          <Col
            css={css`
              display: flex;
              flex-direction: column;
              align-items: start;

              @media (max-width: 767.98px) {
                align-items: center;
              }
            `}
          >
            <p
              css={css`
                color: black;
                text-align: left;

                @media (max-width: 767.98px) {
                  text-align: center;
                }
              `}
            >
              {description}
            </p>
            <PrimaryButton to='/about-us/ifmsa' color='#1f3868' isLarge={false}>
              <i
                className='fa-solid fa-arrow-right'
                style={{ marginRight: '6.95px' }}
              />{' '}
              More on the IFMSA
            </PrimaryButton>
          </Col>
        </Row>
      </Container>
      <br />
      <br />
    </Container>
  );
}
