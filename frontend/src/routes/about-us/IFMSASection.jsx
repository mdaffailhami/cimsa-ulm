import { css } from '@emotion/react';
import { Col, Container, Image, Row } from 'react-bootstrap';
import PrimaryButton from '../PrimaryButton';
import OnHoverAnimationCss from '../OnHoverAnimationCss';

export default function IFMSASection() {
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

            ${OnHoverAnimationCss(1.03)}
          `}
        >
          <Col>
            <Image
              fluid
              alt='IFMSA Logo'
              src='https://cimsa.fk.ugm.ac.id/wp-content/uploads/sites/442/2021/09/IFMSA-1.jpg'
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
              IFMSA is a <b>non-profit</b>, <b>non-governmental</b>, and{' '}
              <b>non-partisan</b> <b>federation</b> representing{' '}
              <b>association of medical students internationally</b>. Since
              1951, <b>IFMSA has been run</b> for and by medical students{' '}
              <b>around the world</b>. IFMSA has been{' '}
              <b>recognized by the United Nations’ System</b> and
              <b> World Health Organization</b>.
              <b> CIMSA has been affiliated</b> with the IFMSA{' '}
              <b>since 2002 </b>and is the{' '}
              <b>sole representative since September 11th, 2019</b>.
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
